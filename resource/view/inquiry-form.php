<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Inquiry Form</title>
</head>
<body>
    <form class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="email" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation" required>
        </div>
        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone"required>
        </div> 
        <div class="col-md-7">
            <label for="Message" class="form-label">Message</label>
            <input type="text" class="form-control" id="Message" name="Message"required>
        </div>   
        
        <div class="col-12">
            <center><button type="submit" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
             </center>
        </div>
        
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
