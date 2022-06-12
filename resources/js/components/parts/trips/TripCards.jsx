import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

// function TripCards({TripBlockchainInfo, TripDBInfo}) {
function TripCards({TripBlockchainInfo}) {

    return (
        <div>
            <h2>{TripBlockchainInfo.location}</h2>
            <h2>{TripBlockchainInfo.price}</h2>
            <h2>{TripBlockchainInfo.groupSize}</h2>
            <h2>{TripBlockchainInfo.actualSize}</h2>
            {/* <h2>{TripDBInfo.startDate}</h2>
            <h2>{TripDBInfo.endDate}</h2>
            <h2>{TripDBInfo.img}</h2> */}
        </div>
    );
}

export default TripCards;