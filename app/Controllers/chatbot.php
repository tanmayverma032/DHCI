<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    // Main view with floating button
    public function index() {
        $this->load->view('chatbot_view');
    }

    // AJAX endpoint for chat messages
    public function send_message() {
        // Allow only AJAX requests
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        // Get user message
        $userMessage = $this->input->post('message', TRUE);
        
        if (empty($userMessage)) {
            echo json_encode(['reply' => 'Please enter a message.']);
            return;
        }

        // Get bot reply
        $reply = $this->get_bot_reply($userMessage);
        
        echo json_encode(['reply' => $reply]);
    }

    // Bot logic
    private function get_bot_reply($message) {
        $msg = strtolower(trim($message));
        
        // Default reply
        $reply = "Thank you for your message! 🙏 Our team will get back to you shortly.";
        
        // Custom responses
        if (strpos($msg, 'hello') !== false || strpos($msg, 'hi') !== false) {
            $reply = "Hello! 👋 Welcome to DHCI. How can I help you today?";
        }
        elseif (strpos($msg, 'how are you') !== false) {
            $reply = "I'm doing great! Thanks for asking. 😊 How can I assist you?";
        }
        elseif (strpos($msg, 'help') !== false) {
            $reply = "I can help you with:\n• DHCI Services\n• Product Information\n• Support Queries\n• Contact Details\n\nWhat would you like to know?";
        }
        elseif (strpos($msg, 'price') !== false || strpos($msg, 'cost') !== false) {
            $reply = "For pricing details, please contact our sales team at sales@dhci.com or call +91 9218017525";
        }
        elseif (strpos($msg, 'contact') !== false || strpos($msg, 'phone') !== false) {
            $reply = "📞 Contact Us:\n• Phone: +91 9218017525\n• Email: support@dhci.com\n• Website: www.dhci.com";
        }
        elseif (strpos($msg, 'email') !== false) {
            $reply = "📧 Our Email Addresses:\n• Support: support@dhci.com\n• Sales: sales@dhci.com\n• Info: info@dhci.com";
        }
        elseif (strpos($msg, 'thank') !== false) {
            $reply = "You're welcome! 🌟 Feel free to ask if you need anything else.";
        }
        elseif (strpos($msg, 'bye') !== false || strpos($msg, 'goodbye') !== false) {
            $reply = "Goodbye! Have a great day! 👋";
        }
        elseif (strpos($msg, 'service') !== false) {
            $reply = "We offer various services including Web Development, Mobile Apps, Digital Marketing, and IT Consulting. Which service interests you?";
        }
        
        return $reply;
    }
}
?>