<?php

$data=array(3,1,5);

//$Linklist=new LinkList();
// for($i=0;$i<count($data);$i++)
// {
//    $Linklist->InsertData($data[$i]);
// }

//$Linklist->printData();
class Node{
    private $data;
    private $next;

    public function __construct(){
        $this->data=0;
        $this->next=null;
    }

    public function SetData($data):void{
            $this->data=$data;
    }

    public function GetData():int{
        return $this->data;
    }

    public function SetNext($next):void{
        $this->next=$next;
    }
    public function GetNext(){
        return $this->next;
    }
}

class LinkList
{
    private $head;
    private $id;

    public function __construct($id){
        $this->head=null;
        $this->id=$id;
    }
        //Insert Data
public function InsertData($data):void
  {
    //creating a New Node
    $newNode=new Node();
    $newNode->SetData($data);

    if($this->head){
        $currentNode=$this->head;
        //finding last Node
        while($currentNode->GetNext() !=null){
            $currentNode=$currentNode->GetNext();
            //echo $currentNode->GetData()."<br>";
        }

        //new Node Assign to previous last Node->next
        $currentNode->SetNext($newNode);
    }
    else{
        //List is Empty new node will be first node
        $this->head=$newNode;
    }
  }
public function GetLLData($id):int
{
    $node=new Node();
   
   
    if($this->id == $id && $this->head)
    {
        $currentnode=$this->head;
        while($currentnode->GetNext() !=null)
        {      
            echo "Node id :".$this->id;
            echo "...".$currentnode->GetData()."....<br>";
            $currentnode=$currentnode->GetNext();
        }
    }
    
}

  public function printData(){
     $newnode=new Node();
 
     if($this->head)
     {
         $currentNode=$this->head;
         while($currentNode->GetNext() !=null)
         {
             echo "Node->".$currentNode->GetData()."<br>";
             $currentNode=$currentNode->GetNext();
         }
         echo "Node->".$currentNode->GetData()."<br>";
     }
 }    
}


?>