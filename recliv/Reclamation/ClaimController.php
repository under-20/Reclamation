<?php
class ClaimController {
    private $claimModel;
    private $responseModel;

    public function __construct($claimModel, $responseModel) {
        $this->claimModel = $claimModel;
        $this->responseModel = $responseModel;
    }

    public function show($subjectId) {
        $claims = $this->claimModel->getClaimsBySubject($subjectId);
        foreach($claims as &$claim) {
            $claim['responses'] = $this->responseModel->getResponsesByClaim($claim['id']);
        }
        include __DIR__.'/../../views/claims/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->claimModel->createClaim($_POST['subject_id'], $_POST['content']);
            header("Location: /subjects/" . $_POST['subject_id']);
        }
    }

public function addResponse() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->responseModel->createResponse(
            $_POST['claim_id'],
            $_POST['content']
        );
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}}
?>