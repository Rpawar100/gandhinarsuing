<?php
define('GSM_CHARSET_GSM7', 0);
define('GSM_CHARSET_UNICODE', 2);
define('GSM_7BIT_ESC', "\x1b");

function getPartCount($content) {
    $gsm_7bit_chars = array(
        '@', '£', '$', '¥', 'è', 'é', 'ù', 'ì', 'ò', 'Ç', "\n", 'Ø', 'ø', "\r", 'Å', 'å',
        'Δ', '_', 'Φ', 'Γ', 'Λ', 'Ω', 'Π', 'Ψ', 'Σ', 'Θ', 'Ξ', "\x1b", 'Æ', 'æ', 'ß', 'É',
        ' ', '!', '"', '#', '¤', '%', '&', "'", '(', ')', '*', '+', ',', '-', '.', '/',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ':', ';', '<', '=', '>', '?',
        '¡', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
        'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ä', 'Ö', 'Ñ', 'Ü', '§',
        '¿', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'ä', 'ö', 'ñ', 'ü', 'à'
    );
    
    $gsm_7bit_chars_ext = array(
        "\f", '^', '{', '}', '\\', '[', '~', ']', '|', '€'
    );
    
    $gsm_chars_replace = array();
    $gsm_chars_ext_esc = array();
    $gsm_chars_all = array();
    
    $gsm_chars_all = array_merge($gsm_7bit_chars, $gsm_7bit_chars_ext);
        
        foreach ($gsm_chars_all as $c) {
            $gsm_chars_replace[$c] = '';
        }
        
        foreach ($gsm_7bit_chars_ext as $c_ext) {
            $gsm_chars_ext_esc[$c_ext] = GSM_7BIT_ESC.$c_ext;
        }
 
        if(mb_strlen(strtr($content, $gsm_chars_replace), 'UTF-8') == 0)
        {
            $charset=GSM_CHARSET_GSM7;
        }
        else
        {
            $charset=GSM_CHARSET_UNICODE;
        }
      
        
        if ($charset == GSM_CHARSET_GSM7) {
            
            // Add escape character to extended charset
            $content = strtr($content, $gsm_chars_ext_esc);
            
            // Check if everything fits to one message
            if (mb_strlen($content, 'UTF-8') <= 160)
                return 1;
            
            // Start counting the number of messages
            $sms_count = ceil(mb_strlen($content, 'UTF-8') / 153);
            $free_chars = mb_strlen($content, 'UTF-8') - floor(mb_strlen($content, 'UTF-8') / 153)*153;
            
            // We have enough free characters left, don't care about escape character at the end of sms part
            if ($free_chars >= $sms_count-1)
                return $sms_count;
            
            $sms_count = 0;
            while (mb_strlen($content, 'UTF-8') > 0) {
                
                // Advance sms counter
                $sms_count++;
                
                // Check for trailing escape character
                if (mb_substr($content, 153, 1, 'UTF-8') == GSM_7BIT_ESC) {
                    $content = mb_substr($content, 152, NULL, 'UTF-8');
                } else {
                    $content = mb_substr($content, 153, NULL, 'UTF-8');
                }
                
            }
            
            return $sms_count;
        
        } elseif ($charset == GSM_CHARSET_UNICODE) {
            
            // Check if everything fits to one message
            if (mb_strlen($content, 'UTF-8') <= 70)
                return 1;
            
            // Just split it up
            return ceil(mb_strlen($content, 'UTF-8') / 67);
            
        }
        
    } // getPartCount
    
