<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/main.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Slot</title>
</head>

<body>
    <div class="container h-100">
    <div id="slot-name">
                    <h2 >Seven Cards Poker-Slot</h2>
                </div>
        <div class="row h-100 justify-content-center align-items-center">
            <div id="slot" class="card">
                <div id="cards-container" class="card-header">
                    <div class="slot-cards"></div>
                    <div class="slot-cards"></div>
                    <div class="slot-cards"></div>
                    <div class="slot-cards"></div>
                    <div class="slot-cards"></div>
                    <div class="slot-cards"></div>
                    <div class="slot-cards"></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <h6>Select bet size</h6>
                            <select id="bet-size">
                                <option>1</option>
                                <option>2</option>
                                <option>5</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <button id="btn-spin" type="button">Spin</button>
                        </div>
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm">
                                    <h6>Balance<h6>
                                            <p id="balance">0</p>
                                            <p id="balance-error">
                                                <p>

                                </div>
                                <div class="col-sm">
                                    <div class="col-xs-2">
                                        <label for="balance-input">Add balance</label>
                                        <input class="form-control" id="balance-input" type="text">
                                        <button id="btn-add-balance" class="btn btn-success">add</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="win-msg-container"></div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>