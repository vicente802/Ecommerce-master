<?php
$basic  = new \Nexmo\Client\Credentials\Basic('35e13d00', '1NubCuNc3Ox8OXEL');
$client = new \Nexmo\Client($basic);


$msg = $_POST['msg'];
$receiver = $_POST['receiver'];

$message = $client->message()->send([
    'to' => $receiver,
    'from' => 'ISPSC-GRADUATESCHOOL',
    'text' => $msg,
]);
?>
<form action="smsAPI.php">
  <div class="form-group">
    <label for="sender">Sender:</label>
    <input type="text" class="form-control" name="sender" placeholder="Sender Name">
  </div>
  <div class="form-group">
    <label for="pwd">Receiver:</label>
    <input type="text" name="receiver" class="form-control" placeholder="Receiver ex. 09123456789">
  </div>
  <div class="form-group">
    <label for="pwd">Message:</label>
    <textarea class="form-control" name="msg" placeholder="MESSAGE......."></textarea>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>