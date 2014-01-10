  <div id="contactModal" class="reveal-modal" data-reveal> 
      <h2>Awesome. I have it.</h2> 
      <hr>
      <form data-abide> 
        <div class="name-field top-reveal-field"> 
          <label>Your name*</label> 
          <input type="text" required pattern="[a-zA-Z]+"> 
          <small class="error">Your name is required.</small> 
        </div> 
        <div class="email-field top-reveal-field"> 
          <label>Email*</label> 
          <input type="email" required> 
          <small class="error">A valid email address is required.</small> 
        </div> 
        <div class="textarea-field">
          <label>Message*</label>
          <textarea required pattern="alpha_numeric" placeholder="Throw me a message" ></textarea>
          <small class="error">You need to write a message.</small> 
        </div>
        <button class="submit-btn btn-border" type="submit">Send Message</button>
        <!-- <button id="close-btn" class="close-reveal-modal">Close</button> -->
      </form>
      <a class="close-reveal-modal">&#215;</a> 
  </div>