<!-- <h2>Contacts</h2> -->

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <form method="post" action="contact/submit" >
            <div class="form-floating">
                <input class="form-control" id="name" name="name" type="text" placeholder="Name" data-sb-validations="required" />
                <label for="name">Search</label>
            </div>

            <div class="form-floating">
                <input class="form-control" id="email" name="email" type="text" placeholder="Email" data-sb-validations="required" />
                <label for="email">Email</label>
            </div>

            <div class="form-floating">
                <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone" data-sb-validations="required" />
                <label for="phone">Phone</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                <label for="message">Message</label>
            </div>

            <br>
            <button class="btn btn-secondary text-uppercase" id="submitButton" type="submit">
                <i class="fa-solid fa-paper-plane"></i> Send
            </button>
            <br><br>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>