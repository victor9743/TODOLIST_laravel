<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\issue;
use DateTime;

class issue_controller extends Controller
{
    //
    public function teste($create_at){

        $date = new DateTime($create_at);
        return $date->format('d/m/Y');
    }

    public function issues(){

        $issue = issue::all();
        
        foreach($issue as $item_issue){
            
           $item_issue->create_at =  $this->teste($item_issue->create_at);
        }
        return $issue;
         
    }

    public function store_issue(Request $issue){

        if(($issue->todo == "true" && $issue->doing == "false" && $issue->done == "false")||($issue->todo == "false" && $issue->doing == "true" && $issue->done == "false")||($issue->todo == "false" && $issue->doing == "false" && $issue->done == "true")||($issue->todo == "false" && $issue->doing == "false" && $issue->done == "false")){
            
            $new_issue = new issue;
            $new_issue->desc = $issue->desc;
            $new_issue->create_at = $issue->create_at;
            $new_issue->todo = $issue->todo;
            $new_issue->doing = $issue->doing;
            $new_issue->done = $issue->done;
    
            $new_issue->save();
            
            return [
                "msg" => "issue cadastrado com sucesso",
            ];

        }else{
            return [
                "msg" => "Não é permitido inserir mais de um campo com o valor true"
            ];
        }

      
    }

    public function findById($id){

        $issueID = issue::findOrFail($id);

        $issue = issue::where('id', $issueID->id)->first()->toArray();

        return $issue;
    }
    public function update_issue(Request $issue){
        
        $UP_issue = $issue->all();

        issue::findOrFail($issue -> id)->update($UP_issue);
        return $UP_issue;
    }
}
