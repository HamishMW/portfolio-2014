
      <h2>Let's do this.</h2> 
      <hr>
      <form id="contactForm" data-abide> 
        <div class="name-field top-reveal-field"> 
          <label>Name*</label> 
          <input id="name" name="name" type="text" required pattern="[a-zA-Z]+" placeholder="Your name"> 
          <small class="error">Your name is required.</small> 
        </div> 
        <div class="email-field top-reveal-field"> 
          <label>Email*</label> 
          <input id="email" name="email" type="email" required placeholder="Your email address"> 
          <small class="error">A valid email address is required.</small> 
        </div> 
        <div class="textarea-field">
          <label>Message*</label>
          <textarea id="message" required placeholder="Throw me a message" ></textarea>
          <small class="error">Message text is required.</small> 
        </div>
        <button name="submit" id="sendButton" class="load-button slide-left submit-btn btn-border" type="submit"><span class="load-span">Send Message</span> <span class="spinner"></span></button>
      </form>
      <a class="close-reveal-modal">&#215;</a> 
