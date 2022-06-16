import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { createPost } from '../APICalls';
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getStorage, ref, uploadBytes,getDownloadURL } from "firebase/storage";


function CreatePost({ createPostText, setCreatePostText, createPostImage, setCreatePostImage, setRefreshFriendsPosts, refreshFriendsPosts }) {

  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  const startFirebase = () =>{
      // Your web app's Firebase configuration
    const firebaseConfig = {
      apiKey: "AIzaSyCZ9TzwfZ68KD5QcSqKDuOHrAeEJDzocF0",
      authDomain: "cryptoaway-1e7b5.firebaseapp.com",
      projectId: "cryptoaway-1e7b5",
      storageBucket: "cryptoaway-1e7b5.appspot.com",
      messagingSenderId: "610100511219",
      appId: "1:610100511219:web:b4a19c04a0d4448bfe1286"
    };
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
  
  }

    const createPostProcess = async () =>{
        // if(createPostText != "" || createPostImage != "Insert a URL!"){
        //     const create = createPost(createPostText, createPostImage);
        //     setCreatePostImage("Insert a URL!");
        //     setCreatePostText("Write Something Cool!")
        //     document.querySelector(".closeModal").click();
        //     setRefreshFriendsPosts(!refreshFriendsPosts);
        // }

        if(createPostText != ""){
        const fileInput = document.getElementById('input');

        const file = fileInput.files[0];
        console.log(file.name);
        const storage = getStorage();
        const storageRef = ref(storage, file.name);
        console.log(storageRef)

        // 'file' comes from the Blob or File API
        const uploadFile = await uploadBytes(storageRef, file).then((snapshot) => {
          console.log(snapshot)
          console.log('Uploaded a blob or file!');
        });

        const getUrl = await getDownloadURL(storageRef)
        .then((url) => {
          console.log(url);
          const create = createPost(createPostText, url);
          // setCreatePostImage("Insert a URL!");
          setCreatePostText("Write Something Cool!")
          document.querySelector(".closeModal").click();
          setRefreshFriendsPosts(!refreshFriendsPosts);
          window.location.href = location.origin + "/timeline";
        })
      }
    }

    useEffect(()=>{
      startFirebase();
    },[])

    return (
            <>
            <span class="createPost" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-pencil-fill"></i></span>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Upload your image</label>
                          <input type="file" id="input" />
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" id="message-text" placeholder="Write Something Cool!" value={createPostText} onChange={ (e) => setCreatePostText(e.target.value) }></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer justify-content-start">
                      <div className="col-6 text-center">
                        <button type="button" class="updateButton w-50" onClick={createPostProcess}>Create</button>
                      </div>
                      <div className="col-6 text-center">
                        <button type="button" class="cancelButton closeModal w-50" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </>
    );
}

export default CreatePost;

