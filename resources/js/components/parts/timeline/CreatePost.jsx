import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import { createPost } from '../APICalls';

function CreatePost({ createPostText, setCreatePostText, createPostImage, setCreatePostImage }) {


    const createPostProcess = async () =>{
        if(createPostText != "" || createPostImage != "Insert a URL!"){
            const create = createPost(createPostText, createPostImage);
            setCreatePostImage("Insert a URL!");
            setCreatePostText("Write Something Cool!")
            document.querySelector(".closeModal").click();
        }
    }

    return (
            <>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-brush-fill"></i></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Post!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Image</label>
                          <input type="text" class="form-control" id="recipient-name" value={createPostImage} onChange={ (e) => setCreatePostImage(e.target.value) } />
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Text</label>
                          <textarea class="form-control" id="message-text" value={createPostText} onChange={ (e) => setCreatePostText(e.target.value) }></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onClick={createPostProcess}>Create!</button>
                    </div>
                  </div>
                </div>
            </div>
        </>
    );
}

export default CreatePost;

