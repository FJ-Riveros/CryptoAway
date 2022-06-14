import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Web3 from 'web3/dist/web3.min.js'
import {tripsABI, tripsAddress} from '../../../smart-contracts/ABI';


function MetamaskButton() {
    const [ accountConnected, setAccountConnected ] = useState(false);
    const [ accounts, setAccounts ] = useState("");
    const [ isMetamaskConnected, setIsMetamaskConnected ] = useState(false);


    let web3;
    // let accounts;
    let contractInstance;
    const loadWeb3 = async () =>{
        
        if (window.ethereum) {
            try {
                web3 = new Web3(Web3.givenProvider);
                setAccounts(await web3.eth.requestAccounts())
                contractInstance = await new web3.eth.Contract(
                    tripsABI, 
                    tripsAddress
                )
                setIsMetamaskConnected(true);

            } catch (err) {
                console.log("User cancelled");
                console.log(err);
            }
        }
    }
    
    window.ethereum.on('accountsChanged', async () => {
        // setIsMetamaskConnected(false);
        checkIfMetamaskConnected();
    });

    const checkIfMetamaskConnected = async () =>{   
            const {ethereum} = window;
            const accounts = await ethereum.request({method: 'eth_accounts'});
            setAccounts(accounts)
            setIsMetamaskConnected( accounts && accounts.length > 0);
    }

    useEffect(()=>{
        checkIfMetamaskConnected();
    },[]);

    return (
        <>
            {!isMetamaskConnected ?
                <button className="metamaskButton" onClick={()=> loadWeb3() }>Connect Metamask</button>
                // <button className="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2
                // " onClick={()=> loadWeb3() }>Connect Metamask</button>

                : 
                <button className="metamaskAddress">{accounts[0]}</button>
            }
        </>
    );
}

export default MetamaskButton;
