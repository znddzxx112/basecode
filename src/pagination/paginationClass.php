<?php 

class PaginationClass
{
	private $each_disNums;//每页显示的条目数
	private $nums;//总条目数
	private $current_page;//当前被选中的页
	private $sub_pages;//每次显示的页数
	private $pageNums;//总页数
	private $page_array = array();//用来构造分页的数组
	private $subPage_link;//每个分页的链接
	private $subPage_type;//显示分页的类型

	// ------------------------------------------------------
	
	public function initialize($param = array())
	{
		if( is_array($param) && !empty($param))
		{
			foreach ($param as $key => $val) 
			{
				if(property_exists($this, $key))
				{
					$this->$key = $val;
				}
			}
		}

		$this->each_disNums=intval($each_disNums);
	    $this->nums=intval($nums);
	    if(!$current_page){
	    	$this->current_page=1;
	    }else{
	    	$this->current_page=intval($current_page);
	    }
	    $this->sub_pages=intval($sub_pages);
	    $this->pageNums=ceil($nums/$each_disNums);
	    $this->subPage_link=$subPage_link;
	    $this->show_SubPages($subPage_type);
	}

	public function creat_links()
	{
		
	}

	function show_SubPages($subPage_type){
	    if($subPage_type == 1){
	    	$this->subPageCss1();
	    }elseif ($subPage_type == 2){
	    	$this->subPageCss2();
	    }
	}

	function subPageCss1(){
	   $subPageCss1Str="";
	   $subPageCss1Str.="共".$this->nums."条记录，";
	   $subPageCss1Str.="每页显示".$this->each_disNums."条，";
	   $subPageCss1Str.="当前第".$this->current_page."/".$this->pageNums."页 ";
	    if($this->current_page > 1){
		    $firstPageUrl=$this->subPage_link."1";
		    $prewPageUrl=$this->subPage_link.($this->current_page-1);
		    $subPageCss1Str.="[首页] ";
		    $subPageCss1Str.="[上一页] ";
	    }else {
		    $subPageCss1Str.="[首页] ";
		    $subPageCss1Str.="[上一页] ";
	    }
      
	    if($this->current_page < $this->pageNums){
		    $lastPageUrl=$this->subPage_link.$this->pageNums;
		    $nextPageUrl=$this->subPage_link.($this->current_page+1);
		    $subPageCss1Str.=" [下一页] ";
		    $subPageCss1Str.="[尾页] ";
	    }else {
		    $subPageCss1Str.="[下一页] ";
		    $subPageCss1Str.="[尾页] ";
	    }
      
    	echo $subPageCss1Str;
      
   }
     
     
  /*
   构造经典模式的分页
   当前第1/453页 [首页] [上页] 1 2 3 4 5 6 7 8 9 10 [下页] [尾页]
   */
  function subPageCss2(){
   $subPageCss2Str="";
   $subPageCss2Str.="当前第".$this->current_page."/".$this->pageNums."页 ";
      
      
    if($this->current_page > 1){
	    $firstPageUrl=$this->subPage_link."1";
	    $prewPageUrl=$this->subPage_link.($this->current_page-1);
	    $subPageCss2Str.="[首页] ";
	    $subPageCss2Str.="[上一页] ";
    }else {
	    $subPageCss2Str.="[首页] ";
	    $subPageCss2Str.="[上一页] ";
    }
      
   	$a=$this->construct_num_Page();
    for($i=0;$i<count($a);$i++){
	    $s=$a[$i];
	     if($s == $this->current_page ){
	     $subPageCss2Str.="[".$s."]";
	     }else{
	     $url=$this->subPage_link.$s;
	     $subPageCss2Str.="[".$s."]";
	     }
    }
      
    if($this->current_page < $this->pageNums){
	    $lastPageUrl=$this->subPage_link.$this->pageNums;
	    $nextPageUrl=$this->subPage_link.($this->current_page+1);
	    $subPageCss2Str.=" [下一页] ";
	    $subPageCss2Str.="[尾页] ";
    }else {
	    $subPageCss2Str.="[下一页] ";
	    $subPageCss2Str.="[尾页] ";
    }
    echo $subPageCss2Str;
   }


   function construct_num_Page(){
    if($this->pageNums < $this->sub_pages){
    $current_array=array();
     for($i=0;$i<$this->pageNums;$i++){
     $current_array[$i]=$i+1;
     }
    }else{
    $current_array=$this->initArray();
     if($this->current_page <= 3){
      for($i=0;$i<count($current_array);$i++){
      $current_array[$i]=$i+1;
      }
     }elseif ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1 ){
      for($i=0;$i<count($current_array);$i++){
      $current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i;
      }
     }else{
      for($i=0;$i<count($current_array);$i++){
      $current_array[$i]=$this->current_page-2+$i;
      }
     }
    }
      
    return $current_array;
   }

}