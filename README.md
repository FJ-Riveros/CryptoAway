#

<div align="center">
  <a href="https://github.com/FJ-Riveros/CryptoAway">
    <img src="https://github.com/FJ-Riveros/CryptoAway/blob/ef4d51c836e993a15cf41d83d63caabb1d640f8b/img/logo.png" alt="Logo" width="250" height="250">
  </a>

#

  A social network Web App where you can add friends, give likes to their posts, comment, earn `$Away` the cryptocurrency of the app and the most important feature. Travel with your friends or even strangers, paying with cryptocurrencies!
  
</div>

#
   
  &nbsp;
  
  <!-- TABLE OF CONTENTS -->

  <summary>:scroll:Table of Contents</summary>
  <ol>
    <li>
      <a href="#stack">Stack</a>
    </li>
    <li>
      <a href="#deploy">Deploy and Hosting</a>
    </li>
    <li>
      <a href="#roadmap">Roadmap</a>
    </li>
    <li><a href="#details">Details</a></li>
    <li><a href="#rewards">Token $away and rewards</a></li>
    <li>
      <a href="#flowChart">Flow Charts</a>
      <ol>
        <li><a href="#flowChartAdmin">Admin</a></li>
        <li><a href="#flowChartLogged">Logged User</a></li>
        <li><a href="#flowChartUnlogged">Unlogged User</a></li>
      </ol>
    </li>
    <li><a href="#EER">Database EER</a></li>
    <li><a href="#navigation">Navigation</a></li>
    <li><a href="#userInteractions">User Interactions</a></li>
    <li><a href="#checkpoint">Checkpoint</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>

 &nbsp;
  #
   
<div id="stack" align="center">
  <h2>:books:Stack</h2>
<p>Techonologies used in this project</p>

  
  
  | Frontend | Backend | Others |
  |--|--|--|
  | <div align="center"><a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> </a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/> </a> <a href="https://sass-lang.com" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/sass/sass-original.svg" alt="sass" width="40" height="40"/> </a> <a href="https://jquery.com" target="_blank" rel="noreferrer"> <img src="https://cdn.iconscout.com/icon/free/png-256/jquery-8-1175153.png" alt="jquery" width="40" height="40"/> </a> <a href="https://https://reactjs.org.com" target="_blank" rel="noreferrer"> <img src="https://alternative.me/media/256/react-native-icon-pb99lshx8fagxe0r-c.png" alt="React" width="40" height="40"/> </a> <a href="https://axios-http.com/es/docs/intro" target="_blank" rel="noreferrer"><img src="https://user-images.githubusercontent.com/8939680/57233882-20344080-6fe5-11e9-9086-d20a955bed59.png" alt="Axios" width="40" height="40"/></a></div> | <div align="center"> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a><a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://cdn3.iconfinder.com/data/icons/logos-and-brands-adobe/512/194_Laravel-512.png" alt="laravel" width="40" height="40"/> </a> <a href="https://solidity-es.readthedocs.io/es/latest/" target="_blank" rel="noreferrer"> <img src="https://miro.medium.com/max/1200/0*yqbRInqX0ZRUlVS0" alt="Solidity" width="40" height="40"/> </a>  <a href="https://ethereum.org/es/" target="_blank" rel="noreferrer"> <img src="https://github.com/ethereum/ethereum-org/blob/fe5ba46f061ba342ca57b9401920ef4677d9c980/public/images/logos/Ethereum-Icon-small.png" alt="Ethereum" width="40" height="40"/> </a> <a href="https://nodejs.org/es/" target="_blank" rel="noreferrer"> <img src="https://the-guild.dev/blog-assets/nodejs-esm/nodejs_logo.png" alt="Node" width="40" height="40"/> </a> </div>| <div align="center"> <a href="https://www.figma.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/figma/figma-icon.svg" alt="figma" width="40" height="40"/> </a> <a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> ![AWS](https://img.shields.io/badge/AWS-%23FF9900.svg?style=for-the-badge&logo=amazon-aws&logoColor=white) ![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white) ![Trello](https://img.shields.io/badge/Trello-%23026AA7.svg?style=for-the-badge&logo=Trello&logoColor=white) </div>|
  
  &nbsp;
  
   #
  
</div>
  
   <div id="deploy" align="left">
    <h2 align="center"> :factory: Deploy and Hosting</h2>
   <p>There is going to be a separation between the DBMS and the actual Web Application. The DB is hosted in <img src="https://img.shields.io/badge/AWS-%23FF9900.svg?style=for-the-badge&logo=amazon-aws&logoColor=white" alt="AWS" width="60" height="20"/> as
   an instance of a <a href="https://aws.amazon.com/es/rds/?did=ft_card&trk=ft_card" target="_blank" rel="noreferrer">RDS</a> server, while the domain name and the Web hosting is provided by <a href="https://www.hostinger.com/" target="_blank" rel="noreferrer">
       <img src="https://codetahiche.com/wp-content/uploads/2022/04/Hostinger_Horizontal_Purple.jpg" alt="AWS" width="60" height="20"/></a>.</p>
    <p>The cloud storage is provided by <a href="https://www.firebase.com/" target="_blank" rel="noreferrer">
       <img src="https://damiandeluca.com.ar/wp-content/uploads/2018/03/firebase.png" alt="AWS" width="30" height="30"/></a> where the aplication uploads every image that the user uses in his posts or as a profile picture and saves the reference to these files in the DB.</p>
   </div>
  &nbsp;
  
#
  
  <div id="roadmap" align="left">
    <h2 align="center">:calendar:Roadmap</h2>
  
  - [x] ~~**Pages**~~
    - [x] ~~**Registered User**~~
    - [x] ~~**Profile**~~
    - [x] ~~**Trip section**~~
    - [x] ~~**Register**~~
    - [x] ~~**Landing**~~
    - [x] ~~**Admin**~~
    - [x] ~~**Specific for each trip**~~
   
  - [ ] **User actions**
    - [x] ~~**Give like to a post**~~
    - [x] ~~**Create a post**~~
    - [x] ~~**Modify user profile**~~
    - [x] **Create a comment**
    - [ ] **Create a trip suggestion**
    
  - [x] ~~**Blockchain**~~
    - [x] ~~**Smart Contracts**~~
    - [x] ~~**$Away token**~~
    - [x] ~~**Give rewards**~~
    - [x] ~~**Pay the trip with cryptocurrencies**~~
    - [ ] **Weekly raffle**
    - [ ] **Implement the discount on any trip**
  
  - [x] **App translation**
    - [x] ~~**English**~~
    
  - [ ] **Others**
    - [x] ~~**Hosting**~~
    - [x] ~~**Separate server for DB and Web**~~
    - [x] ~~**Responsive**~~
    - [x] ~~**Implement React Components**~~
    - [x] ~~**Protect endpoints**~~
    - [x] ~~**Async calls**~~
    - [x] ~~**MVC**~~
    - [x] ~~**TDD (Test Driven Development)**~~
    - [x] ~~**Testing the API endpoints with UNIT**~~
    - [x] ~~**Create the Rest API in Laravel**~~
    - [x] **Domain name**
    
  </div>
  &nbsp;
  
#

<div id="details">
<h2 align="center">:page_with_curl:Details</h2>
  
My idea is to make a hybrid application (there are many applications that implement this feature, since the storage in the blockchain is quite expensive, so the information with more volume and less sensitive is stored in conventional BDD while the sensitive data is stored in the Blockchain), mixing in the backend PHP along with Solidity (the coding language of the Ethereum Blockchain). 
The blockchain itself is a decentralized database, so I plan to host the currency I will create `$away` there, along with the `raffle` and reward logic, plus the payment for the trips.

</div>

&nbsp;

#

<h3 id="rewards" align="center">:moneybag:$away and rewards</h3>
  
  #
  
To attract users, a specific cryptocurrency will be created for the ecosystem of our web app called `$away`, the interaction is simple, every time we perform each of the following actions we will be rewarded with "X" amount of `$away`.
The token $away will be sent to the digital `wallet` of the user (Metamask).

<div align="center">

| Task | Reward |
|--|--|
| Book a trip | `+40 $away`|
| Suggest a trip with itinerary (Need to be approved by the team) | `+20 $away`|
| Rate a trip and leave a comment | `+5 $away`|

</div>

<p align="center">:money_with_wings:What is the utility of $away for the users?<p>

<div align="center">

| Amount of $away | Reward |
|--|--|
| `$50` | Discount of 15$ on any trip |
| `$20` | Enter the weekly raffle to have a chance to win a free trip!|

</div>

  &nbsp;
  
  #

<div align="center" id="flowChart">
  <h2 align="center">:chart_with_upwards_trend:Flow Charts</h2>
   
  <img src="https://github.com/FJ-Riveros/CryptoAway/blob/ef4d51c836e993a15cf41d83d63caabb1d640f8b/img/userNavigation.PNG" alt="FlowChart">
  
  &nbsp;
  <h2 id="flowChartAdmin" align="center">Admin</h2>
  
```mermaid
graph LR
A((Admin)) --> B(Delete User)
A --> C(Change user Data)
B --> D{Admin Page}
C --> D
A --> E(Delete trip)
A --> F(Add trip)
E --> G{Blockchain}
F --> G
```
  &nbsp;

  
  <h2 id="flowChartLogged" align="center">Logged User</h2>
  
```mermaid
graph LR
A((Logged User))
A--> B(Add Friend)
A --> C(Create a post)
A --> D(Give like)
A --> E(Comment)
A --> G(Suggest a trip)
A --> F(Book a trip)
A --> H(Enter the weekly Raffle)
H --> I{Blockchain}
F --> I
B --> J{Personal Feed}
C --> J{Personal Feed}
D --> J{Personal Feed}
E --> J{Personal Feed}
G --> J{Personal Feed}

```
  &nbsp;
  
  <h2 id="flowChartUnlogged" align="center">Unlogged User</h2>
  
```mermaid
graph LR
A((Unlogged User)) --> B(View the Landpage)
A --> C(Create an account)
A --> D(Login)
C --> E{Landpage}
D --> F{Personal Feed}
```

  
</div>

&nbsp;
  
#

<div id="EER" align="center">
  <h2>:open_file_folder:Database EER</h2>
   
  <img src="https://github.com/FJ-Riveros/CryptoAway/blob/ef4d51c836e993a15cf41d83d63caabb1d640f8b/img/EER.PNG" alt="EER">

</div>

 &nbsp;
 
#

<div id="navigation">
  
 <h2 align="center">:walking:Navigation</h2>
  
<p>We can move around the App through this browser located on the upper area.<p>
  
![image](https://user-images.githubusercontent.com/62405636/145852758-e4a393cf-0539-409c-8567-4cb3bacc218c.png)

### Feed
![image](https://user-images.githubusercontent.com/62405636/145855891-9919aa70-b66d-444a-9284-c25d430a608c.png)
  
&nbsp;
  
#
  
 <h2 align="center" id="userInteractions">:eyes:User interactions</h2>
  
### Give likes to your friend's posts
  #
![image](https://user-images.githubusercontent.com/62405636/145853467-1550eb78-3862-44d5-8d27-92611bce6e43.png)

### Friend suggestions
  #
![image](https://user-images.githubusercontent.com/62405636/145853566-0d68e575-87a5-49ee-85bc-9963c9c904c3.png)

### Book a trip
  #
![image](https://user-images.githubusercontent.com/62405636/145853714-e53b5662-4a2f-4e30-bc77-7cd2ca18cba7.png)

### User trips
  #
![image](https://user-images.githubusercontent.com/62405636/145853928-c94ca726-e204-4fc8-936b-b58e8b762f05.png)

### Add a friend
  #
![image](https://user-images.githubusercontent.com/62405636/145854027-2d0a5ea8-671e-4344-9ed8-8db896ad44d9.png)

### Accept or reject a friend request
  #
![image](https://user-images.githubusercontent.com/62405636/145854359-1aea4f4e-b0db-41a3-990f-207d4d65f304.png)

### See and delete friends
  #
![image](https://user-images.githubusercontent.com/62405636/145854140-45e4298a-0f65-46da-9290-2a8085b5956a.png)

### Create own posts
  #
![image](https://user-images.githubusercontent.com/62405636/145854640-e9f47f9a-4ab0-42bb-a450-35afe80fbc25.png)

### View own posts
  #
![image](https://user-images.githubusercontent.com/62405636/145854695-2dc52abc-a5f0-401d-9635-bc0f2e9d272c.png)

### Modify user profile
  #
To modify your profile, you must go to the left panel and click on the icon shown below.

![image](https://user-images.githubusercontent.com/62405636/145853041-73880d2f-7d2d-45c2-9d2a-fbaa54f4e34f.png)

A form is presented to modify the profile.
![image](https://user-images.githubusercontent.com/62405636/145853144-f3c3d29f-6455-46f8-a73f-a8ad2a6dafad.png)
</div>

&nbsp;

#

<h3 align="left" id="checkpoint">:film_projector: Checkpoint video</h3>

[![Watch the video](https://img.youtube.com/vi/YYZwIGYq6ho/maxresdefault.jpg)](https://youtu.be/YYZwIGYq6ho)

#

<h3 align="left" id="contact">:computer:Connect with me <a href="https://linkedin.com/in/fj-riveros" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/linked-in-alt.svg" alt="fj-riveros" height="30" width="40" /></a></h3>
<p align="left">
<img align="center" src="https://github-readme-stats.vercel.app/api/top-langs?username=fj-riveros&show_icons=true&locale=en&layout=compact" alt="fj-riveros" /> 
</p>



