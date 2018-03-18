<div class="container">
    <div id="modal-contact-form-wrapper" class="modal-contact-forma-c">
        <div class="modal-content-contact-form">
            <span class="close">&times;</span>
            <div class="col-md-12 text-center">
                <h3>Connect you with us</h3>
                <p></p>
            </div>

            <form name="contactForm" id="contact_form" method="post" action="/send-user-message" style="font-family: 'Helvetica Neue', Helvetica;">
                {{ csrf_field() }}
                <div class="row">
                    <div>
                        <input type="text" name="name" id="name" required="required" oninvalid="this.setCustomValidity('Please!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" class="form-control" placeholder="Your name">
                    </div>
                    <br>
                    <div>
                        <input type="text" name="email" id="email" required="required" oninvalid="this.setCustomValidity('Please!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" class="form-control" placeholder="Your email">
                    </div>
                    <br>
                    <div>
                        <textarea name="message" id="message" required="required" oninvalid="this.setCustomValidity('Please, enter your message!')" oninput="setCustomValidity('')" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <p id="submit">
                            <input type="submit" id="send_message" value="Send" class="btn btn-border">
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>