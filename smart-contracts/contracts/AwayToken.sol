//SPDX-License-Identifier: Unlicense
pragma solidity ^0.8.0;

import "@openzeppelin/contracts/token/ERC20/ERC20.sol";

contract AwayToken is ERC20{
    // TBD
    constructor(uint256 initialSupply) ERC20("Away", "AWY"){
        _mint(msg.sender, initialSupply);
    }
}