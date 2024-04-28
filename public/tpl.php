<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group input[type="radio"],
        .form-group input[type="checkbox"] {
            margin-right: 5px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="<?= Func::route("process.php") . (isset($update) && count($update) > 0 ? "?action=update&user_id={$update['user_id']}" : "?action=create") ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" value="<?= isset($update) && count($update) > 0 ? $update["name"] : '' ?>" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" value="<?= isset($update) && count($update)>0 ? $update["email"] : '' ?>" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" value="<?= isset($update) && count($update)>0 ? $update["password"] : '' ?>" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
        <table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>created_at</th>
                <th>Operaton</th>
                
            </tr>
           
            <?php if(count($users) > 0): ?>
              <?php foreach($users as $user): ?>
                <tr>
                <td><?=  $user->name ?></td>
                <td><?=  $user->email ?></td>
                <td><?=  $user->password ?></td>
                <td><?=  $user->gender ?></td>
                <td><?=  $user->created_at ?></td>
                <td>
                    <a href="<?= Func::route("process.php") . "?user_id=$user->user_id&action=edit" ?>">update</a>
                    <a href="<?= Func::route("process.php") . "?user_id=$user->user_id&action=delete" ?>">delete</a>
                </td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
    
          </table>
    </div>
</body>
</html>
