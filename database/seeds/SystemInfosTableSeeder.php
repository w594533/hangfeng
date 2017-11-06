<?php

use Illuminate\Database\Seeder;

class SystemInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('system_infos')->delete();
        
        \DB::table('system_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'address' => '浙江省诸暨市陶朱街道唐三路19号',
                'phone' => '0575-87306058',
                'facsimile' => '0575-87303922',
                'email' => 'mi53068@hangfengtex.com',
                'image' => '',
                'contract_person' => '吴珊',
                'created_at' => NULL,
                'updated_at' => '2017-11-06 11:20:23',
                'hr_email' => 'hr@hangfeng.com',
                'about_body' => '<p>诸暨航丰针纺织有限公司坐落于浙江东部城市诸暨陶朱工业区。位于长三角经济带，西施故里，五泄之畔。公司占地面积2万多平方米，建筑面积2万平方米，绿化面积1千多平方米。</p><p>公司拥有各类针纺制品生产设备以及相关配套设备，为产品质量提供了有力的保证。主要民用产品有：航空用毯、被、枕头、枕头套、餐巾、桌布、头靠等系列产品。公司特聘多名资深权威的工艺技术专业管理人员，以及具有十几年相关工作经验的生产、销售管理人员，除生产前叙各种产品以外，公司新近开发、生产各种规格的无纺布、针织、梭织布制品。</p><p><br></p>',
                'about_show_business_images' => '["upload\\/system_info\\/image\\/show1.jpg","upload\\/system_info\\/image\\/8f8663776351c3ba838bb9489adb640d.jpeg","upload\\/system_info\\/image\\/2b99cd92ff9ed9fc92b73b852200e507.jpeg"]',
                'about_honor_images' => '["upload\\/system_info\\/image\\/brand1.jpg","upload\\/system_info\\/image\\/36a42c1a469f3f8ffa9171f8a78fc1b6.jpeg","upload\\/system_info\\/image\\/1352f4fa913197ef4f734d965ed737f5.jpeg","upload\\/system_info\\/image\\/86da828387b732c1d213480a90975980.jpeg"]',
                'about_vision_title' => '整合优质品牌资源，重新诠释您的实力',
                'about_vision_body' => '<p>企业愿景是企业未来的宏伟蓝图，公司将秉承“诚信，务实，创新，超卓”的经营理念,一如既往坚持以客户满意为导向，不断完善售后服务，不断开拓，在绚烂的航空纺织品天空上增添航丰一抹浓厚的色彩。</p><p><br></p>',
            ),
        ));
        
        
    }
}