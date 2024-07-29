<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Contact</h1>
        <form action="<?= base_url('admin/contacts/store') ?>" method="post">
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="address">Address</option>
                    <option value="phone">Phone</option>
                    <option value="email">Email</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Value</label>
                <input type="text" name="value" id="value" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Contact</button>
        </form>
    </div>
</body>
</html>