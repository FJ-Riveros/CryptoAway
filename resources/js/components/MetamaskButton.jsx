import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Web3 from 'web3/dist/web3.min.js'
import {contractABI, address} from "../../../smart-contracts/ABI";

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
                    contractABI, 
                    address
                )
                console.log(contractInstance);
                const owner = await contractInstance.methods.getOwner().call();
                console.log(owner);
                const tripInfo = await contractInstance.methods.getTrip(0).call();
                console.log(tripInfo);
                console.log(accounts);
                setIsMetamaskConnected(true);

            } catch (err) {
                console.log("User cancelled");
                console.log(err);
            }
        }
    }
    
    window.ethereum.on('accountsChanged', async () => {
        setIsMetamaskConnected(false);
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
                <button onClick={()=> loadWeb3() }>Connect Metamask</button>
                : 
                <button>{accounts[0]}</button>
            }
        </>
    );
}

export default MetamaskButton;

// if (document.getElementById('reactGetTrips')) {
//     ReactDOM.render(<Trips />, document.getElementById('reactGetTrips'));
// }
