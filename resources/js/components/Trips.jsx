import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Web3 from 'web3/dist/web3.min.js';
import {contractABI, address} from '../../../smart-contracts/ABI';
import TripCards from './parts/trips/TripCards';


function Trips() {
    const [ accountConnected, setAccountConnected ] = useState(false);
    const [ accounts, setAccounts ] = useState("");
    const [ isMetamaskConnected, setIsMetamaskConnected ] = useState(false);
    const [ allTrips, setAllTrips ] = useState("");



    let web3;
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
                
                console.log(accounts);
                setIsMetamaskConnected(true);

            } catch (err) {
                console.log("User cancelled");
                console.log(err);
            }
        }
    }
    
    window.ethereum.on('accountsChanged', async () => {
        checkIfMetamaskConnected();
    });

    const checkIfMetamaskConnected = async () =>{   
            const {ethereum} = window;
            const accounts = await ethereum.request({method: 'eth_accounts'});
            setAccounts(accounts)
            const connected = accounts && accounts.length > 0;
            setIsMetamaskConnected( connected );
            if(connected){
                getTripsInfo();
            }
    }

    const getTripsInfo = async () =>{   
        await loadWeb3();
        const numberOfTrips = await contractInstance.methods.getTripsNumber().call();
        console.log(numberOfTrips)
        const tripInfo = await contractInstance.methods.getTrip(0).call();

        let allTrips = [];
        //Get all the trips
        for(let i=0; i < numberOfTrips; i++){
            allTrips.push(await contractInstance.methods.getTrip(i).call());
        }
        // console.log(allTrips);
        // setAllTrips(allTrips);

        //Mount the Trips into the cards
        const mountedTrips = allTrips.map(( trip )=>{
            return < TripCards TripBlockchainInfo={trip} />
        })

        console.log(mountedTrips)
        setAllTrips(mountedTrips);


    }

    // useEffect(()=>{
    //     checkIfMetamaskConnected();
    // },[isMetamaskConnected]);

    useEffect(()=>{
        checkIfMetamaskConnected();
    },[]);

    return (
        <>
            {!isMetamaskConnected ?
                <h2>Please, connect Metamask in order to see the available Trips</h2>
                 : <h2>Connected</h2>
            }

            {
                allTrips
            }


        </>
    );
}

export default Trips;


