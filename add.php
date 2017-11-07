<?php 
session_start();

// if user is not logged in
if (!$_SESSION['loggedInUser']) {
    header("Location: index.php");
}

include 'includes/conn.php';
include 'includes/func.php';

if (isset($_POST['add'])) {
    // set all variables to empty by default
    $clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany =
        $clientNotes = "";

    if (!$_POST['clientName']) {
        $nameError = "Please enter a name <br>";
    } else {
        $clientName = validateFormData($_POST['clientName']);
    }

    if (!$_POST['clientEmail']) {
        $nameError = "Please enter an email <br>";
    } else {
        $clientEmail = validateFormData($_POST['clientEmail']);
    }

    $clientPhone = validateFormData($_POST['clientPhone']);
    $clientAddress = validateFormData($_POST['clientAddress']);
    $clientCompany = validateFormData($_POST['clientCompany']);
    $clientNotes = validateFormData($_POST['clientNotes']);

    if ($clientName && $clientEmail) {
        $query = "INSERT INTO clients(id, name, email, phone, address, 
        company, notes, date_added) VALUES(NULL, '$clientName', '$clientEmail',
        '$clientPhone', '$clientAddress', '$clientCompany', '$clientNotes',
        CURRENT_TIMESTAMP)";

        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location:clients.php?alert=success");
        }else{
            echo "Error: " . $query . "<br>" . mysql_error($conn);
        }
    }
}

mysqli_close($conn);

include 'includes/header.php';
?> 

<h1>Add Client</h1>

<form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
    method="post">
    <div class="form-group col-sm-6">
        <label for="client-name">Name *</label>
        <input id="client-name" class="form-control input-lg" 
        type="text" name="clientName" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email *</label>
        <input id="client-email" class="form-control input-lg" 
        type="text" name="clientEmail" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input id="client-phone" class="form-control input-lg" 
        type="text" name="clientPhone" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input id="client-address" class="form-control input-lg" 
        type="text" name="clientAddress" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input id="client-company" class="form-control input-lg" 
        type="text" name="clientCompany" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-notes">Notes</label>
        <textarea id="client-notes" class="form-control input-lg" name="clientNotes"
            cols="30" rows="10"></textarea>
    </div>
    <div class="col-sm-12">
    <a class="btn btn-lg btn-default" href="clients.php" type="button">Cancel</a>
    <button class="btn btn-lg btn-success pull-right" type="submit" name="add">Add
        Client</button>
    </div>
</form>