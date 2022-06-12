//SPDX-License-Identifier: Unlicense
pragma solidity ^0.8.0;

import "@openzeppelin/contracts/token/ERC20/ERC20.sol";

contract AwayToken is ERC20{
    constructor(uint256 initialSupply) ERC20("Away", "AWY"){
        _mint(msg.sender, initialSupply);
    }

     mapping(address => mapping (address => uint256)) allowed;

      function approve(address delegate, uint256 numTokens) public override returns (bool) {
        allowed[msg.sender][delegate] = numTokens;
        emit Approval(msg.sender, delegate, numTokens);
        return true;
    }
}