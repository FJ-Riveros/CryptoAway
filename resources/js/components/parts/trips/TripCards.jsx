import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

function TripCards({TripBlockchainInfo, TripDBInfo, buyTrip, ownTrip}) {

    let title;
    if(ownTrip){
        title = <h3>My Trips</h3>
    }else{
        title = <h3>Avaiable Trips</h3>
    } 

    return (
        <>
            
                <div className="tripCard mt-3">
                    <div className="row w-100">
                            <div className="col-5" style={{paddingLeft: "0"}}>
                            <div data-toggle="collapse" data-target={`#collapse${TripDBInfo.idTrip}`} aria-expanded="false" aria-controls={`collapse${TripDBInfo.idTrip}`}>
                                <div className="trip__image" style={{backgroundImage: `url(${TripDBInfo.img})`}}>

                                </div>
                            </div>
                        </div>
                        <div className="col-7">
                            <h2>{TripBlockchainInfo.location}</h2>
                            <span><i class="fa-solid fa-coins"></i><span className="ml-3">{TripBlockchainInfo.price}</span></span><br />
                            <span><i class="fa-solid fa-users"></i><span className="ml-2"> {TripBlockchainInfo.groupSize} / {TripBlockchainInfo.actualSize}</span></span><br />
                            <span><i class="fa-solid fa-plane-departure"></i><span style={{marginLeft: "0.8rem"}}>{TripDBInfo.startDate}</span></span><br />
                            <span><i class="fa-solid fa-plane-arrival"></i><span style={{marginLeft: "0.8rem"}}>{TripDBInfo.endDate}</span></span><br />
                            {ownTrip ?
                            <span className="boughtTrip">Bought</span>
                            :   TripBlockchainInfo.actualSize < TripBlockchainInfo.groupSize ?
                                    <span className="buyTrip" onClick={()=> buyTrip(TripDBInfo.idTrip - 1, TripBlockchainInfo.price)}>Buy</span>
                                :
                                <span className="boughtTrip">Sold Out</span>
                        }
                        </div>
                    </div>
                    <div className={`comments comment${TripDBInfo.idTrip}`}>
                        <div class="collapse" id={`collapse${TripDBInfo.idTrip}`}>
                            <p>{TripDBInfo.itinerary}</p>
                        </div>
                                                
                    </div>
                </div>
        </>
    );
    
}

export default TripCards;