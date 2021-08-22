<!DOCTYPE html>
<html>
    <head>
        <title>Send Mail</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h4 class="sent-notification"></h4>
            <form id="myForm">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="from">From</label>
                        <input type="email" name="from" class="form-control" id="from" placeholder="name@example.com">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="to">To</label>
                        <input type="email" name="to" class="form-control" id="to" placeholder="name@example.com">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" rows="5"></textarea>
                    </div>
                </div>
                <button type="button" onclick="sendEmail()" class="btn btn-primary" value="Send an Email">Send</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function sendEmail(){
            var from = $("#from");
            var to = $("#to");
            var message = $("#message");

            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    from: from.val(),
                    to: to.val(),
                    message: message.val(),
                },
                success: function (response){
                    $('#myForm')[0].reset();
                    $('.sent-notification').text("Message Sent Successfully");
                }
            });
        }
    </script>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $to = $_POST['to'];
        $subject = "Test Mail";
        $message = $_POST['message'];
        $from = $_POST['from'];
        $headers  = "From : $from";
        mail($to, $subject, $message, $headers);
        echo "Mail Sent";
    }

?>