<?php
 /**
 * Plugin Name: algo Vue
 * Description: Vue-App in WordPress.
 * version: 1.0
 */

     add_shortcode('ai-plugin','commentFunction');
     wp_enqueue_script('vue','https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js');
    
     function commentFunction($text){
         $blog = get_bloginfo('name');
        
          global $comment;
          $comment_id= $comment-> comment_ID;
      
        
          $args = array(
            'number' => '1',
            'post_id' => $post->ID
          );
          $comments = get_comments($args);
          $new='';
          foreach($comments as $comment) :
              $new = $comment->comment_content;
          endforeach;
        //  commentdatas;


        if($new== $text){
          echo ("<div id='appvue'  > $text
            <ai-plugin author='" .$text ."' /> <div >
          <div >
          
         
        </div>plugin by $text    </div> 
        ");  // </div>job: {{getResults}}<br/> 
         }
         echo "plugin by $text ";
        
      
        
        // return $sentiment_result;
       
        // return  $text. "<p>sentiment: [$link]</p>";

         wp_enqueue_script('app', plugin_dir_url(__FILE__) . 'app.js');
     }
     
   //   add_filter( 'preprocess_comment' , 'comment_analyzer_sentiment' );
      add_filter ('comment_text', 'commentFunction');

     function comment_analyzer_sentiment( $commentdata ) {
     
        echo isset($meta['Title']) ? $meta['Title'] : ''; 
      $input = array( "document" => $commentdata[4] );
      
      $comment = $commentdata[4];
      
      echo ("<div id='appvue' author='" .$input ."' > <div >
      <div >
      
      </div>job: {{getResults.results['0001']['results.json'].data.result.classPredictions}}<br/> 
    </div>plugin by $input </div>");

      wp_enqueue_script('app', plugin_dir_url(__FILE__) . 'app.js');

     return   $commentdata;
     
     }
 ?>
