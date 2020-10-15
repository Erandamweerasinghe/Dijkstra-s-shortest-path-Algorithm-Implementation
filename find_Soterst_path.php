<?php

include 'Linked_List.php';
$INT_MAX = 0x7FFFFFFF;
$ORIGIN=0;
$DESTINATION=4;

 echo " Starting Points :".$ORIGIN."</br>".
   "Ending Points :" .$DESTINATION."</br>";

function Dijkstra($graph,$start,$end,$verticesCount)
{
    global $INT_MAX;
   
    $dist=array();
    $spt=array();
    $node=array();
    $LLArray=array();

    //Initialy distence and spt will be infinaitly and false
    for($i=0;$i<$verticesCount;$i++)
    {
        $dist[$i]=$INT_MAX;
        $spt[$i]=false; 
        $node[$i]=array();
    }
   //origin point will be zero
   $dist[$start]=0;
   array_push($node[$start],$start);

   for($count=0;$count<$verticesCount-1;$count++)//count=2
   {
       $u=MinDistence($dist,$spt,$verticesCount);// u=3
       $spt[$u]=true;

       for($v=0;$v<$verticesCount;$v++)//v=5<6  ,graph=3 ,dist=1
       {
           if(!$spt[$v] && $graph[$u][$v] && $dist[$u]!=$INT_MAX && $dist[$u]+$graph[$u][$v]<=$dist[$v])
           {
               $dist[$v]=$graph[$u][$v]+$dist[$u];
               
               if(empty($node[$v]))
               {
                    $node[$v]=$node[$u];
                    array_push($node[$v],$v);
               }
               else{
                $Linklist=new LinkList($v);
                array_push($LLArray,$v);
                $Linklist->InsertData($v); //First value is Node Number
                for($j=0;$j<count($node[$v]);$j++)
                {
                    $Linklist->InsertData($node[$j]);  
                }
     
               // $Linklist->printData();  //..................................................................
                $node[$v]=$node[$u];
                array_push($node[$v],$v);
               // $Linklist->GetLLData($v);
               }
                
           }    
       }      
   }
   
   echo "Alternative path have for node :";

   for($i=1;$i<count($LLArray);$i++)
   {
   		 echo $LLArray[$i-1].",";
   }
  
   echo "</br></br>";
 
   PrintNode($graph,$node,$verticesCount);
}

function PrintNode($graph,$node,$verticesCount)
{

        for($i=0;$i<$verticesCount;$i++)
           {
               echo "Node[".$i."]={";
               for($j=0;$j<count($node[$i]);$j++)
               {
                 echo "\t".$node[$i][$j];
               }
               echo "}=".GetDistence($graph,$node[$i],count($node[$i]))."<br>";
           }
}

function GetDistence($graph,$node,$Count)
{   
    $distence=0;
    for($i=0;$i<$Count-1;$i++)
    {
        $distence+=$graph[$node[$i]][$node[$i+1]];
    }
    return $distence;
}

function MinDistence($dist,$spt,$verticesCount)
{
    global $INT_MAX;
    $min=$INT_MAX;
    $min_Index=0;

    for($v=0;$v<$verticesCount;$v++)//v=5
    {
        if($spt[$v]==false && $dist[$v]<=$min)
        {
            $min=$dist[$v];// min=2
            $min_Index=$v;//min_Index=3
        }
    }
    return $min_Index;
}




$graph = array(

    array(0,4,8,0,0,0,0),
    array(4,0,0,2,1,0,0),
    array(8,0,0,0,2,0,0),
    array(0,2,0,0,6,0.5,0),
    array(0,1,2,6,0,3,1),
    array(0,0,0,5,3,0,1),
    array(0,0,0,0,1,1,0),
);

$graph2=array(
    array(0,1,5,0,0,0,0,0,0,0),
    array(1,0,0,2,4,0,0,0,0,0),
    array(5,0,0,0,0,0,3,0,0,0),
    array(0,2,0,0,0,5,0,0,0,0),
    array(0,4,0,0,0,3,2,0,0,0),
    array(0,0,0,5,3,0,0,4,2,0),
    array(0,0,2,0,2,0,0,1,0,2),
    array(0,0,0,0,0,4,1,0,0,0),
    array(0,0,0,0,0,2,0,0,0,7),
    array(0,0,0,0,0,0,2,0,7,0),
);

$graph3=array(
    array(0,4,0,0,0,0,0,8,0),
    array(4,0,8,0,0,0,0,11,0),
    array(0,0,0,7,0,4,0,0,2),
    array(0,0,7,0,9,14,0,0,0),
    array(0,0,0,9,0,10,0,0,0),
    array(0,0,4,14,10,0,2,0,0),
    array(0,0,0,0,0,2,0,1,6),
    array(8,11,0,0,0,0,1,0,7),
    array(0,0,2,0,0,0,6,7,0),
   );

Dijkstra($graph3, $ORIGIN,$DESTINATION,9);
?>