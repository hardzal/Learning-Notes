<?php

define('UPLOAD_DIRECTORY', 'upload/');
define('MAXSIZE', 5242880);

$allowedExtensions = array('pdf', 'doc', 'docx', 'odt');
$allowedMimes = array(
    'application/pdf', // for .pdf files
    'application/msword', // for .doc files
    'application/octet-stream', // for .docx files
    'application/vnd.oasis.opendocument.text', // for .odt files
);

/**
* Checks if given file’s extension and MIME are defined as allowed, which are defined in
* array $ALLOWED_EXTENSIONS and $ALLOWED_MIMES, respectively.
*
* @param $uploadedTempFile The file that is has been uploaded already, from where the MIME
* will be read.
* @param $destFilePath The path that the dest file will have, from where the extension  - will be read.
* @return True if file’s extension and MIME are allowed; false if at least one of them is  - not.
*/

function validFileType($uploadedTempFile, $destFilePath) {
	global $allowedExtensions, $allowedMimes;
	
	$fileExtension = pathinfo($destFilePath, PATHINFO_EXTENSION);
	$fileMime = mime_content_type($uploadedTempFile);

	$validFileExtension = in_array($fileExtension, $allowedExtensions);
	$validFileMime = in_array($fileMime, $allowedMimes);

	$validFileType = $validFileExtension && $validFileMime;

	return $validFileType;
}

/**
* Handles the file upload, first, checking if the file we are going to deal with is  - actually an
* uploaded file; second, if file’s size is smaller than specified; and third, if the file  - is a valid file (extension and MIME).
*
* @return Response with string of the result; if it has been successful or not.
*/

function handleUpload() {
	$uploadedTempFile = $_FILES['file']['tmp_name'];
	$filename = basename($_FILES['file']['name']);
	$destFile = UPLOAD_DIRECTORY . $filename;

	$isUploadedFile = is_uploaded_file($uploadedTempFile);
	$validSize = ($_FILES['file']['size'] <= MAXSIZE) && ($_FILES['file']['size'] >= 0);

	if($isUploadedFile && $validSize && validFileType($uploadedTempFile, $destFile)) {

		$success = move_uploaded_file($uploadedTempFile, $destFile);
	
		if($success) {
			$response = 'The file was uploaded successfully!';
		} else {
			$response = 'An unexpected error occured; the file could not be uploaded';
		}

	} else {
		$response = 'Error: the file you tried to upload is not a valid file. Check file type and size.';
	}
	return $response;
}

$validFormSubmission = !empty($_FILES);

if($validFormSubmission) {
	$error = $_FILES['file']['error'];
	
	switch($error) {
		case UPLOAD_ERR_OK:
			$response = handleUpload();
			break;
		case UPLOAD_ERR_INI_SIZE:
			$response = 'Error: file size is bigger than allowed.';
			break;
		case UPLOAD_ERR_PARTIAL:
			$response = 'Error: the file was only partially uploaded.';
			break;
		case UPLOAD_ERR_NO_FILE:
			$response = 'Error: no file could have been uploaded.';
			break;
		case UPLOAD_ERR_NO_TMP_DIR:
			$response = 'Error: no temp directory! Contact the admnistrator.';
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$response = 'Erro: it aws not possible to write in the disk. Contact the administrator.';
			break;
		case UPLOAD_ERR_EXTENSION:
			$response = 'Error: a PHP Extension stopped the upload. Contact the administrator.';
			break;
		default:
			$response = 'An Unexpected error occured; the file could not be uploaded.';
		break;
	}
} else {
	$response = 'Error: the form was not submitted correctly - did you try to access the action url directly?';
}

echo $response;
