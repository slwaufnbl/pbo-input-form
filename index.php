<?php
// Class Person menggunakan OOP (nilai tambah)
class Person {
    public $firstname;
    public $lastname;
    public $phone;
    public $address;

    public function __construct($firstname, $lastname, $phone, $address) {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->phone     = $phone;
        $this->address   = $address;
    }

    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname;
    }
}

$person = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['reset'])) {
    $person = new Person(
        htmlspecialchars($_POST['firstname']),
        htmlspecialchars($_POST['lastname']),
        htmlspecialchars($_POST['phone']),
        htmlspecialchars($_POST['address'])
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form - PBO</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #1a73e8;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .btn-submit {
            display: block;
            margin: 0 auto;
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-submit:hover {
            background-color: #1558b0;
        }

        .result {
            margin-top: 24px;
            font-size: 14px;
            color: #333;
            line-height: 1.8;
        }

        .btn-reset {
            background: none;
            border: none;
            color: #1a73e8;
            cursor: pointer;
            font-size: 13px;
            padding: 0;
            margin-top: 6px;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <input
                type="text"
                name="firstname"
                placeholder="Firstname"
                value="<?= $person ? htmlspecialchars($person->firstname) : '' ?>"
            >
            <input
                type="text"
                name="lastname"
                placeholder="Lastname"
                value="<?= $person ? htmlspecialchars($person->lastname) : '' ?>"
            >
            <input
                type="text"
                name="phone"
                placeholder="Phone Number"
                value="<?= $person ? htmlspecialchars($person->phone) : '' ?>"
            >
            <textarea
                name="address"
                placeholder="Address"
            ><?= $person ? htmlspecialchars($person->address) : '' ?></textarea>

            <button type="submit" class="btn-submit">Submit</button>

            <?php if ($person): ?>
            <div class="result">
                <p>Hi, my name is <?= $person->getFullName() ?></p>
                <p>Phone Number : <?= $person->phone ?></p>
                <p>Address : <?= $person->address ?></p>
                <form method="POST" action="">
                    <button type="submit" name="reset" class="btn-reset">Reset</button>
                </form>
            </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
