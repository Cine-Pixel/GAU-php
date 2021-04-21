<?php 
    function extract_quiz_file($quiz_file_content) {
        $questions_array = array();

        $questions = explode("===", $quiz_file_content);
        array_pop($questions);

        foreach($questions as $question) {
            $question_content = explode("---", $question);

            $q = array();
            $q['title'] = $question_content[0];
            $q['answers'] = array(
                array(substr($question_content[1], 3), $question_content[1][2] === "+" ? "c" : "f"),
                array(substr($question_content[2], 3), $question_content[2][2] === "+" ? "c" : "f"),
                array(substr($question_content[3], 3), $question_content[3][2] === "+" ? "c" : "f"),
            );
            array_push($questions_array, $q);
        }
        return $questions_array;
    }

    function map_question_to_answer($questions_array) {
        $question_answer_map = array();
        for($i=0; $i<count($questions_array); $i++) {
            $question_answer_map["q$i"] = 'a'.array_search('c', array_column($questions_array[$i]['answers'], 1));
        }
        return $question_answer_map;
    }
?>