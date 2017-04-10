// ...
public function indexAction()
{
$form = new Application_Form_Login();
$request = $this->getRequest();
if ($request->isPost()) {
if ($form->isValid($request->getPost())) {
// do something here to log in
}
}
$this->view->form = $form;
}
// ...