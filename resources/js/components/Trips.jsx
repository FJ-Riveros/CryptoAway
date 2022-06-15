import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Web3 from 'web3/dist/web3.min.js';
import {tripsABI, tripsAddress, tokenABI, tokenAddress} from '../../../smart-contracts/ABI';
import TripCards from './parts/trips/TripCards';
import { getAllTrips } from './parts/APICalls';

const BN = require('bn.js');

function Trips() {
    const [ accountConnected, setAccountConnected ] = useState(false);
    // const [ accounts, setAccounts ] = useState("");
    const [ isMetamaskConnected, setIsMetamaskConnected ] = useState(false);
    const [ allTrips, setAllTrips ] = useState([]);
    const [ loadSpinner, setLoadSpinner ] = useState(false);
    const [ tripsOwned, setTripsOwned ] = useState([]);
    

    let web3;
    let tripsContractInstance;
    let tokenContractInstance;
    let accounts;

    const loadWeb3 = async () =>{        
        if (window.ethereum) {
            try {
                web3 = new Web3(Web3.givenProvider);
                // setAccounts(await web3.eth.requestAccounts())
                accounts = await web3.eth.requestAccounts();
                tripsContractInstance = await new web3.eth.Contract(
                    tripsABI, 
                    tripsAddress
                )

                tokenContractInstance = await new web3.eth.Contract(
                    tokenABI, 
                    tokenAddress
                )

                console.log(tripsContractInstance);
                console.log(tokenContractInstance);
                
                setIsMetamaskConnected(true);

            } catch (err) {
                console.log("User cancelled");
                console.log(err);
            }
        }
    }
    
    window.ethereum.on('accountsChanged', async () => {
        checkIfMetamaskConnected();
        setLoadSpinner(false);
    });

    const checkIfMetamaskConnected = async () =>{   
            const {ethereum} = window;
            const accounts = await ethereum.request({method: 'eth_accounts'});
            // setAccounts(accounts)
            const connected = accounts && accounts.length > 0;
            setIsMetamaskConnected( connected );
            if(connected){
                getTripsInfo();
            }
    }

    const getTripsInfo = async () =>{   
        await loadWeb3();
        const numberOfTrips = await tripsContractInstance.methods.getTripsNumber().call();
        console.log(numberOfTrips)
        const tripInfo = await tripsContractInstance.methods.getTrip(0).call();

        let allTrips = [];
        //Get all the trips
        for(let i=0; i < numberOfTrips; i++){
            allTrips.push(await tripsContractInstance.methods.getTrip(i).call());
        }

        //Get the Trips info from the DB
        const tripsDB = await getAllTripsDB();

        //Get the Trips that this user owns
        const tripsOwnedIds = await tripsContractInstance.methods.getUserTripsIds(accounts[0]).call();
        console.log("Trips owned")
        console.log(tripsOwnedIds);
        const tripsOwnedTemp = [];
        //Mount the Trips into the cards
        // const mountedTrips = allTrips.map(( trip, index)=>{
        //     console.log(tripsDB[index]);
        //     if(tripsOwnedIds.includes(index.toString())){
        //         tripsOwnedTemp.push(< TripCards TripBlockchainInfo={trip} TripDBInfo={index <= tripsDB.length ? tripsDB[index] : []} buyTrip={buyTrip} ownTrip={true}/>)
        //     }else{
        //         return < TripCards TripBlockchainInfo={trip} TripDBInfo={index <= tripsDB.length ? tripsDB[index] : []} buyTrip={buyTrip} ownTrip={false}/>
        //     }
        // })
        const mountedTrips = [];

        allTrips.forEach((trip, index)=>{
            if(tripsOwnedIds.includes(index.toString())){
                tripsOwnedTemp.push(< TripCards TripBlockchainInfo={trip} TripDBInfo={index <= tripsDB.length ? tripsDB[index] : []} buyTrip={buyTrip} ownTrip={true}/>)
            }else{
                mountedTrips.push(< TripCards TripBlockchainInfo={trip} TripDBInfo={index <= tripsDB.length ? tripsDB[index] : []} buyTrip={buyTrip} ownTrip={false}/>)
            }
        });

        console.log("MOunted")
        console.log(mountedTrips)

        setTripsOwned(tripsOwnedTemp);

        //Listen actively waiting for a trip to be bought
        let eventBuyTrip = tripsContractInstance.events.TripBooked(async function(error, result) {
            if (!error){
                console.log("Exito!");
                console.log(result);
                await getTripsInfo();
                setLoadSpinner(false);
            }
         });
        
        setAllTrips(mountedTrips);
    }

    
    const buyTrip = async (idTrip, priceTrip) =>{   
        console.log("comprar : " + idTrip);
        const allowance = await tokenContractInstance.methods.allowance(accounts[0], tripsAddress).call();
        const decimals = await tokenContractInstance.methods.decimals().call();
        console.log(allowance);

        if(allowance == 0 || allowance < web3.utils.toBN( priceTrip * (10 ** (decimals)))){
            //Allow the maximum supply 
            // await tokenContractInstance.methods.approve(tripsAddress, web3.utils.toBN((10 ** (decimals)))).send({ from: accounts[0] });
            await tokenContractInstance.methods.approve(tripsAddress, "100000000000000000000000").send({ from: accounts[0] });
        }
        
        setLoadSpinner(true);
        try{
            const buyTrip = await tripsContractInstance.methods.payTrip(idTrip).send({from: accounts[0]});
        }catch(e){
            setLoadSpinner(false);
        }
 

    }

    const getAllTripsDB = async () =>{   
        return await getAllTrips();
    }

    useEffect(()=>{
        checkIfMetamaskConnected();
    },[]);

    return (
        <>
            {loadSpinner &&
            <div className="row justify-content-center mt-3">
                <div class="spinner-border text-warning text-center" role="status">
                </div>
                <span class="w-100 text-center">Waiting for the transaction to complete...</span>
            </div>
            }
            {isMetamaskConnected && !loadSpinner &&
                <div>
                    {tripsOwned.length != 0 &&
                        <div>
                            <h3>My Trips</h3>
                            <hr/>
                        </div>
                    }
                    {tripsOwned}
                    
                    {allTrips.length != 0 &&
                        <div className="mt-3">
                            <h3>Available Trips</h3>
                            <hr/>
                        </div>
                    }
                    {allTrips}
                </div>
            }

            {!isMetamaskConnected &&
                <div className="text-center d-flex align-items-center"
                    style={{
                        height: "50vh",
                    }}>
                    <h3>Please, connect Metamask in order to see the available Trips</h3>
                </div>
            }

        </>
    );
}

export default Trips;


