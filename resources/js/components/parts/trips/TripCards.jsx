import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

function TripCards({TripBlockchainInfo, TripDBInfo, buyTrip}) {



    return (
        <div data-toggle="collapse" data-target={`#collapse${TripDBInfo.idTrip}`} aria-expanded="false" aria-controls={`collapse${TripDBInfo.idTrip}`}>
            <div className="tripCard mt-3">
                <div className="row w-100">
                    <div className="col-5">
                        <div className="trip__image" style={{backgroundImage: `url(${TripDBInfo.img})`}}>

                        </div>
                    </div>
                    <div className="col-7">
                        <h2>{TripBlockchainInfo.location}</h2>
                        <h4>{TripBlockchainInfo.price}</h4>
                        <span>{TripBlockchainInfo.groupSize} / {TripBlockchainInfo.actualSize}</span><br />
                        <span>{TripDBInfo.startDate} - {TripDBInfo.endDate}</span>
                    </div>
                </div>
                <div className="footer mt-2">
                    {/* <i class="bi bi-chat-left-text ml-4 hover__cursor" data-toggle="collapse" data-target={`#collapse${TripDBInfo.idTrip}`} aria-expanded="false" aria-controls={`collapse${TripDBInfo.idTrip}`}></i> */}
                </div>
                <div className="comments">
                    <div class="collapse" id={`collapse${TripDBInfo.idTrip}`}>
                        <p>{TripDBInfo.itinerary}</p>
                    </div>
                    <button onClick={()=> buyTrip(TripDBInfo.idTrip - 1, TripBlockchainInfo.price)}>Buy</button>
                </div>
            </div>

            
        </div>
    );
}

export default TripCards;