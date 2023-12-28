<?php
// Set the upload directory path
$uploadDirectory = './Tiny_Images/';

// Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'file' key exists in the $_FILES array
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Check for upload errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Generate a unique filename to avoid overwriting existing files
            $filename = uniqid('image_') . '_' . basename($file['name']);

            // Move the uploaded file to the desired directory
            $destination = $uploadDirectory . $filename;
            move_uploaded_file($file['tmp_name'], $destination);

            // Provide a response to TinyMCE
            $response = [
                'location' => $destination,
                'success'  => true,
            ];

            // Output the response as JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // If there is an upload error, provide an error response
            $response = [
                'error' => 'Upload failed. Please try again.',
                'success' => false,
            ];

            // Output the error response as JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        // If 'file' key is not found in $_FILES, provide an error response
        $response = [
            'error' => 'No file found in the request.',
            'success' => false,
        ];

        // Output the error response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // If the request method is not POST, provide an error response
    $response = [
        'error' => 'Invalid request method. Use POST.',
        'success' => false,
    ];

    // Output the error response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
