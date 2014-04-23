<?php
/*
 * Controller for the contact form
 */
class ContactController extends BaseController {

  /*
   * Processes the contact form
   */
  public function send() {

    // Get data from inputs in POST
    $email = Input::get('email');
    $content = Input::get('content');

    // The data that will be passed into the mail view blade template
    $data = array(
      'email' => $email,
      'content' => $content
    );

    // use Mail::send function to send email passing the data and using the $email variable in the closure
    Mail::send('emails.auth.contact', $data, function($message) use ($email) {
      $message -> from($email, '');
      $message -> to('jsmith10@ggc.edu', 'Site Admin');
      $message -> subject('Contact Webmaster');
    });

    // Redirect us back to the home page with a flash message
    return Redirect::route('home') -> with(array(
      'alert' => 'You have successfully sent an email to the site admin.',
      'alert-class' => 'alert-success'
    ));
  }

}
