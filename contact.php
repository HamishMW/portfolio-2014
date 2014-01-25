
      <h2>Awesome. I have it.</h2> 
      <hr>
      <form id="contactForm" data-abide> 
        <div class="name-field top-reveal-field"> 
          <label>Your name*</label> 
          <input id="name" name="name" type="text" required pattern="[a-zA-Z]+"> 
          <small class="error">Your name is required.</small> 
        </div> 
        <div class="email-field top-reveal-field"> 
          <label>Email*</label> 
          <input id="email" name="email" type="email" required> 
          <small class="error">A valid email address is required.</small> 
        </div> 
        <div class="textarea-field">
          <label>Message*</label>
          <textarea id="message" required pattern="alpha_numeric" placeholder="Throw me a message" ></textarea>
          <small class="error">Message text is required.</small> 
        </div>
        <button name="submit" id="sendButton" class="load-button slide-left submit-btn btn-border" type="submit"><span class="load-span">Send Message</span> <span class="spinner"></span></button>
        <!-- <button id="close-btn" class="close-reveal-modal">Close</button> -->
      </form>
      <a class="close-reveal-modal">&#215;</a> 
