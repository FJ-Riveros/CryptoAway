import { useState, useEffect} from "react";
import { getUsers, getFriendSuggestions } from './parts/APICalls';
import ReactDOM from 'react-dom';

const AutoComplete = () => {
    
  const [suggestions, setSuggestions] = useState([]);
  const [suggestionIndex, setSuggestionIndex] = useState(0);
  const [suggestionsActive, setSuggestionsActive] = useState(false);
  const [value, setValue] = useState("");
  const [data, setData] = useState([]);
  const [usersId, setUsersId] = useState([]);
  const [idUserSuggestions, setIdUserSuggestions] = useState([]);



  useEffect(() => {
    getData();
  },[])

  const getData = async () => {
    const response = await getUsers();
    const usernames = response.map(( user )=> {
      return {
        userSearchName: user.surname + " " + user.name,
        userId: user.id,
        avatar: user.avatar
      }
    } );
    setData(usernames);

    const suggestions = await getFriendSuggestions(currentDataUser.id);
    const userSuggestions = suggestions.data.map((user)=>{
      return user.id;
    })

    //Used to check if the user can add another user
    setIdUserSuggestions(userSuggestions)
  }


  const handleChange = (e) => {
    const query = e.target.value.toLowerCase();
    setValue(query);
    if (query.length > 1) {
      const filterSuggestions = data.filter(
        (suggestion) =>
          suggestion.userSearchName.toLowerCase().indexOf(query) > -1
      );
      setSuggestions(filterSuggestions);
      setSuggestionsActive(true);
    } else {
      setSuggestionsActive(false);
    }
  };

  const handleClick = (e) => {
    setSuggestions([]);
    setValue(e.target.innerText);
    setSuggestionsActive(false);
  };

  const handleKeyDown = (e) => {
    // UP ARROW
    if (e.keyCode === 38) {
      if (suggestionIndex === 0) {
        return;
      }
      setSuggestionIndex(suggestionIndex - 1);
    }
    // DOWN ARROW
    else if (e.keyCode === 40) {
      if (suggestionIndex - 1 === suggestions.length) {
        return;
      }
      setSuggestionIndex(suggestionIndex + 1);
    }
    // ENTER
    else if (e.keyCode === 13) {
      setValue(suggestions[suggestionIndex]);
      setSuggestionIndex(0);
      setSuggestionsActive(false);
    }
  };

  const addUser = async ( userToAddId )=> {
    axios.post(`${window.location.origin}/api/user/send_friend_request`, {
        userToAdd: userToAddId,
        actualUser: currentDataUser.id,
    })
      .then(function (response) {
        console.log(response);
        getUserSuggestions();
      })
      .catch(function (error) {
      });
}


  const Suggestions = () => {
    

    return (
      <ul className="suggestions">
        {suggestions.map((suggestion, index) => {
          return (
            <li
              className={index === suggestionIndex ? "active" : ""}
              key={index}
              onClick={handleClick}
            >
              <div className="row">
                <div className="col-9">
                  <img src={suggestion.avatar} className="search__user__img" alt="" width="30" height="30"/>
                  <a href={`timeline/${suggestion.userId}`} className="ml-4">
                    {suggestion.userSearchName}
                  </a>
              </div>
              <div className="col-3 d-flex justify-content-end">
                { idUserSuggestions.includes(suggestion.userId) &&  <i className="bi bi-person-plus-fill add" onClick={()=> addUser( suggestion.userId )} ></i> } 
              </div>
              </div>
            </li>
          );
        })}
      </ul>
    );
  };

  return (
    <div className="autocomplete">
      <input
        className="search__bar"
        type="text"
        value={value}
        onChange={handleChange}
        onKeyDown={handleKeyDown}
        placeholder="Search someone!"
      />
      {suggestionsActive && <Suggestions />}
    </div>
  );
  
};

export default AutoComplete;

if (document.getElementById('reactSearch')) {
  ReactDOM.render(<AutoComplete />, document.getElementById('reactSearch'));
}
