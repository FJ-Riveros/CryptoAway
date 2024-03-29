//SPDX-License-Identifier: Unlicense
pragma solidity ^0.8.0;

import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/token/ERC20/utils/SafeERC20.sol";

contract TravelBooking {
    using SafeERC20 for IERC20;

    event TripAvailable(
        uint256 indexed tripId,
        string indexed location,
        uint256 price,
        uint8   groupSize,
        uint8   actualSize
    );
    event TripBooked(
        uint256 indexed invoiceId,
        uint256 indexed tripId,
        address indexed user
    );

    struct Invoice {
        address buyer;
        uint256 tripId;
    }

    struct Trip {
        string  location;
        uint256 price;
        uint8   groupSize;
        uint8   actualSize;
    }

    IERC20 immutable TOKEN;

    address internal _owner;
    uint256 internal _invoiceCounter;
    uint256 internal _tripCounter;

    // mapping(uint256 => Invoice) internal _invoices;
    mapping(address => uint256[]) internal _userHasTrip;
    mapping(uint256 => Trip) internal _trips;

    /**
     * @dev Constructor, only called at deployment of TravelBooking.
     *      Sets the initial owner of the smart contract to claim money.
     */
    constructor(address owner, address token) {
        // Sets the owner of the contract
        _owner = owner;

        // Initialize the ERC20 standard contract at token address
        TOKEN = IERC20(token);
    }

    modifier onlyOwner() {
        require(msg.sender == _owner, "ONLY_OWNER");
        _;
    }

    function getOwner() external view returns (address) {
        return _owner;
    }

    // function getInvoice(uint256 ticketId)
    //     external
    //     view
    //     returns (address buyer, uint256 tripId)
    // {
    //     Invoice memory invoice = _invoices[ticketId];

    //     return (invoice.buyer, invoice.tripId);
    // }

    function getTrip(uint256 tripId)
        external
        view
        returns (string memory location, uint256 price, uint8 groupSize, uint8 actualSize)
    {
        Trip memory trip = _trips[tripId];

        return (trip.location, trip.price, trip.groupSize, trip.actualSize);
    }


    function payTrip(uint256 tripId) external returns (uint256 invoiceId) {
        Trip memory selectedTrip = _trips[tripId];

        require(bytes(selectedTrip.location).length > 0, "TRIP_NOT_FOUND");

        require( selectedTrip.groupSize > selectedTrip.actualSize, "ALLOCATION_COMPLETE");

        // Pull ERC20 tokens that the msg.sender allowed before calling this function
        // msg.sender is the user or contract address that calls to the smart contract
        TOKEN.safeTransferFrom(msg.sender, address(this), selectedTrip.price * (10 ** 18));

        selectedTrip.actualSize++;

        _userHasTrip[msg.sender].push(tripId);

        _invoiceCounter++;

        emit TripBooked(invoiceId, tripId, msg.sender);

        return invoiceId;
    }

    function setTrips(string[] memory locations, uint256[] memory prices, uint8[] memory groupSize)
        external
        onlyOwner
    {
        require(locations.length > 0, "ARRAY_IS_EMPTY");
        require(locations.length == prices.length, "ARRAY_LENGTH_MISSMATCH");
        require(locations.length == groupSize.length, "ARRAY_LENGTH_MISSMATCH");


        for (uint256 x = 0; x < locations.length; x++) {
            _trips[_tripCounter] = Trip(locations[x], prices[x], groupSize[x], 0);

            emit TripAvailable(_tripCounter, locations[x], prices[x], groupSize[x], 0);

            _tripCounter++;
        }
    }

    function transferOwnership(address newOwner) external onlyOwner {
        _owner = newOwner;
    }

    function claimMoney() external onlyOwner {
        // First detect how much token balance contains the smart contract after users bought travel tickets
        // note: address(this) refers to this smart contract address
        uint256 contractBalance = TOKEN.balanceOf(address(this));

        // Them transfer all the balance to the owner address
        TOKEN.safeTransfer(_owner, contractBalance);
    }

    function getContractBalance() public view onlyOwner returns(uint256) {
        return TOKEN.balanceOf(address(this));
    }

    function getTripsNumber() public view returns(uint256) {
        return _tripCounter;
    }

    function getTripFinalPrice(uint256 tripId)
        external
        view
        returns (string memory location, uint256 price, uint8 groupSize, uint8 actualSize)
    {
        Trip memory trip = _trips[tripId];

        return (trip.location, trip.price * (10 **18), trip.groupSize, trip.actualSize);
    }

    function getUserTripsIds(address user)
        external
        view
        returns (uint256[] memory trips)
    {
        return _userHasTrip[user];
    }

}