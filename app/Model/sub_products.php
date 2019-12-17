<?php namespace App;

use Illuminate\Database\Eloquent\Model;
//
use DB;
class sub_products extends Model {

	public function CountSubProducts($product_id){
		$query = DB::select("
			SELECT sc.id, count(sp.sub_category_id) as scate, sc.category_name FROM sub_products sp 
			join sub_categories sc on sc.id = sp.sub_category_id where sp.product_id = '$product_id'
			group by sp.sub_category_id
		");
		
		return $query;
	}
	
	public function getSubProducts($product_id, $subcate_id){
		$query = DB::select("
			select sp.*, sc.category_name from sub_products sp
			join sub_categories sc on sc.id = sp.sub_category_id
			where sp.product_id = '$product_id' and sp.sub_category_id = '$subcate_id'
		");
		
		return $query;
	}
	
	public function getAll(){
		$query = DB::select("
			select s.*, p.product_name as pname, c.category_name
			from sub_products s
			join products p on p.id = s.product_id
			join sub_categories c on c.id = s.sub_category_id
			order by pname, c.category_name
		");
		
		return $query;
	}

}
