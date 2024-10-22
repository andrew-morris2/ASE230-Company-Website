<?php
    $file = '../../data/contacts.json';
    function display_messages($file){
        $fp = file_get_contents($file);
        $contacts = json_decode($fp, true);

        foreach($contacts as $message){
            echo '
            <div class="card">
                <div class="card-header">' . htmlspecialchars($message['name']) . '</div>
                <div class="card-body">
                    <p><strong>Subject:</strong> ' . htmlspecialchars($message['subject']) . '</p>
                    <a href="detail.php?id=' . htmlspecialchars($message['id']) . '" class="btn btn-custom">View Details</a>
                </div>
            </div> 
            ';
        }
    }

    if(isset($_POST['action']) && $_POST['action'] === 'add'){
        $newMessage = [
            'id' => uniqid(),
            'name' => $_POST['name'],
            'subject' => $_POST['subject'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ];
        $jsonData = file_get_contents($file);
        $dataArray = json_decode($jsonData, true);
        $dataArray[] = $newMessage;
        $jsonData = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents($file, $jsonData);
        header('Location: index.php');
        exit();
    }

    function display_details() {
        $jsonPath = '../../data/contacts.json';
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']); // Get the ID from the URL and convert it to an integer
            $otherID = $_GET['id'];
            $data = file_get_contents($jsonPath);
            $dataArray = json_decode($data, true);
            foreach ($dataArray as $item) {
                if ($item['id'] == $id || $item['id'] == $otherID) {
                    $name = $item['name'];
                    $subject = $item['subject'];
                    $email = $item['email'];
                    $message = $item['message'];
                }
            }
            if ($name !== null) {
                echo '
                    <div class="container detail-container">
                        <h2 class="detail-header">Contact Detail</h2>
                        <div class="detail-content">
                            <p><strong>Subject:</strong> ' . htmlspecialchars($subject) . '</p>
                        </div>
                        <div class="detail-content">
                            <p><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>
                        </div>
                        <div class="detail-content">
                            <p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
                        </div>
                        <div class="detail-content">
                            <p><strong>Message:</strong> ' . nl2br(htmlspecialchars($message)) . '</p>
                        </div>
                        <a href="index.php" class="btn btn-custom">Back to Contact Requests</a>
                    </div>
                ';
            }
        }
    }
        
?>