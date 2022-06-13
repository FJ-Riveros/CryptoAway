import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import Web3 from 'web3/dist/web3.min.js';
import {tripsABI, tripsAddress, tokenABI, tokenAddress} from '../../../smart-contracts/ABI';
import TripCards from './parts/trips/TripCards';
import { getAllTrips } from './parts/APICalls';


function Trips() {
    const [ accountConnected, setAccountConnected ] = useState(false);
    // const [ accounts, setAccounts ] = useState("");
    const [ isMetamaskConnected, setIsMetamaskConnected ] = useState(false);
    const [ allTrips, setAllTrips ] = useState("Loading Trips...");



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

        //Mount the Trips into the cards
        const mountedTrips = allTrips.map(( trip, index)=>{
            console.log(tripsDB[index]);
            return < TripCards TripBlockchainInfo={trip} TripDBInfo={index <= tripsDB.length ? tripsDB[index] : []} buyTrip={buyTrip}/>

        })

        console.log(mountedTrips)
        setAllTrips(mountedTrips);
    }

    const buyTrip = async (idTrip, priceTrip) =>{   
        console.log("comprar : " + idTrip);
        // const response = await tokenContractInstance.methods.name().call();
        // console.log(response);

        // var event = tokenContractInstance.Approval(function(error, response) {
        //     if (!error) {
        //         // TargetAddress = response.args.addr;
        //         console.log(response);
        //     }else{
        //         console.log(error);
        //     }
        // });

        const allowance = await tokenContractInstance.methods.allowance(accounts[0], tripsAddress).call();
        if( allowance < priceTrip){
            // const approve = await tokenContractInstance.methods.allowance(accounts[0], tripsAddress).call();
            await tokenContractInstance.methods.approve(tripsAddress, 100000).send({ from: accounts[0] });
        }
        


    //    instructorEvent.watch(function(error, result){
    //         if (!error)
    //             {
    //                 
    //             } else {
    //
    //             }
    //     });

        const afterAllowance = await tokenContractInstance.methods.allowance(accounts[0], tripsAddress).call();

        console.log(afterAllowance == false ? "falso" : "verdadero");

        // const approve = await tripsContractInstance.methods.getTrip(0).call();

    }

    const getAllTripsDB = async () =>{   
        return await getAllTrips();
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
                 : allTrips
            }

        </>
    );
}

export default Trips;


