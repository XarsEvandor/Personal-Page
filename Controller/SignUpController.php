    <?php
require_once __DIR__."./../Model/Forum/Repositories/RegularUserRepo.php";
require_once __DIR__."./../Model/Forum/Handlers/UserHandler.php";

    //NOTES: Ajax cannot work without preventdefault because by the time you leave the page and go to the php page
    // the event handler is destroyed.
    // When requiring a file ALWAYS use __DIR__, so that when the required code runs, the references are correct.
    $json = $_POST['Json'];

    $user = json_decode($json);

    $userId= uniqid("reg");

    $retrievedUser = new User($userId, $user->userName,$user->userPassword,$user->userEmail);

    $userHandler= new UserHandler();
    $regUserRepo = new RegularUserRepo();

    //In the rare case that the generated id already exists in the database, make a new one and try again.
    $done = false;

    for ($i=0; $i<10; $i++){
        if (!$userHandler->checkIdExists($retrievedUser->getUserId())){
            $regUserRepo->insertUser($retrievedUser);
            $done = true;
            break;
        }
        else{
            $userId= uniqid("reg");
            $retrievedUser->setUserId($userId);
        }
    }

    if ($done==false){
        echo "\nYou are the single most unlucky person in this universe";
    }
    else{
        echo "Signup_Success";
    }
