<?php
/*
  Plugin Name: NewsLetter form
  Description: Panorama đăng ký nhận thông tin
  Version: 1.0
  Author: Quang Hung
 
 */

class NewsletterForm{

    private $email;
    private $phone_number;
    private $user_name;
    private $content;

    public function __construct() {
        add_action('wp', array($this, 'newsletter_registration'));
        add_shortcode('newsletter_registration_form', array($this, 'newsletter_shortcode'));
    }

    public function registration_form() {
        echo '<h4 class="title-form-dk">Đăng ký nhận tư vấn</h4>';
        if (is_wp_error($this->validation())) {
            echo '<div style="margin-top: 5px;color:red; font-size:12px" class="">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        }
        if(isset($_GET['mes'])) {
            echo '<div style="margin-bottom: 6px;color:red" class="">';
            echo '<strong>Gởi thành công</strong>';
            echo '</div>';
        }       
        ?>        
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" id="newletterForm">
            <div class="panoramaNewsletter">
                    <input type="text" name="user_name" placeholder="Họ tên">
                    <input type="text" name="phone_number" placeholder="Số điện thoại">
                    <input type="text" name="email" placeholder="Email">
                    <textarea name="content" cols="5" rows="5" placeholder="Nội dung"></textarea>
            </div>
            <input type="submit" name="btnSubmit" value="Đăng ký"/>
        </form>
        <?php
    }
    function validation() {
        if (isset($_POST['btnSubmit'])) {
            if(empty($this->user_name)) {
                return new WP_Error('field','Vui lòng nhập họ tên');
            }
            if(empty($this->phone_number)) {
                return new WP_Error('field','Vui lòng nhập số điện thoại');
            }
            if(empty($this->email)) {
                return new WP_Error('field','Vui lòng nhập Email');
            }            
            if(get_page_by_title($this->email, object, 'newsletter')) {
            	return new WP_Error('field','Email đã tồn tại');
            }
            if( empty($this->content))
            {
                return new WP_Error('field', 'Vui lòng nhập nội dung');
            }
        }        
    }

    function registration() {       
        if ( ! is_wp_error($this->validation())) {
            $args = array(
                'post_title' => esc_attr($this->email),
                'post_type' => 'newsletter',                
                'post_status' => 'publish',
                'post_content' => esc_attr($this->content )
            );
            $metaPost = array(
                'user_name' => esc_attr($this->user_name),
                'phone_number' => esc_attr($this->phone_number),
                'email' => esc_attr($this->email)
            );
            if($this->email) {
                $register_id = wp_insert_post($args); 
            }      
             if ($register_id) {
                foreach ($metaPost as $key => $value) {
                    update_post_meta($register_id, $key, $value);
                }
            }
            if (! is_wp_error($register_id)) { 
                wp_redirect(home_url().'?mes="Gởi thành công"');
                exit();
            } 
        }
    }
    
    function newsletter_registration() {        
        if (isset($_POST['btnSubmit'])) {
            $this->email = isset($_POST['email']) ? $_POST['email'] : ''; 
            $this->user_name = isset($_POST['user_name']) ? $_POST['user_name'] : ''; 
            $this->phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';            
            $this->content = isset($_POST['content']) ? $_POST['content'] : '';            
            $this->registration();
        }        
    }

    function newsletter_shortcode() {
        ob_start();
        $this->registration_form();
        return ob_get_clean();
    }

}

global $eve_register;
$eve_register = new NewsletterForm();
