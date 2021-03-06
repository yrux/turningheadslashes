const tablename='m_flag';const ydebugger=false;var ytabled;
var _hashed = window.location.hash;
if(!_hashed){
    notify('0','Need clauses to generate Flag Table');
    throw new Error("Something went badly wrong!");
}
_hashed = _hashed.replace('#','');
var _myFilters = _hashed.split('&');
var total_filters = [];
var default_type = '';
//total_filters.and = [];
_myFilters.forEach((a,e)=>{
    var _where = {
        col:"",
        condition:"=",
        value:"",
    };
    if(a.indexOf('=')>0){
        var _fil = a.split('=')
        _where.col = _fil[0];
        _where.condition = '=';
        _where.value = "'"+_fil[1]+"'";
        if(_fil[0]=='flag_type'){
            default_type=_fil[1];
        }
        if(e==0){
            let _col = _fil[0];
            total_filters={ [_col] :"='"+_fil[1]+"'",and:[]};
        } else {
            total_filters.and.push(_where);
        }
    }
});
if(!default_type){
    notify('0','Need flag_type clause to generate Flag Table');
    throw new Error("Something went badly wrong!");
}
total_filters.and.push({
        col:"is_deleted",
        condition:"=",
        value:"0",
})
total_filters.and.push({
    col:"is_active",
    condition:"<=",
    value:"1",
});
/*Setting up menus and headings*/
var heading = '';
if(default_type=='FAQCATEGORY'){
    heading = 'FAQ Category';
}
document.querySelector('title').innerHTML = heading+' Listing';
document.getElementsByClassName('card-title')[0].children[0].innerText=heading;
document.getElementsByClassName('content__title')[0].children[0].innerText=heading+' Listing';
document.getElementsByClassName(default_type+'_flag')[0].classList = 'navigation__active';
/*Setting up menus and headings End*/

/*When you want to use FAST CRUD of ytable and you have used joins in the listing use 
type:'ignore' 
in columns which are being shown by the join and not the part of , 
*/
(function() {
    ytabled = new ytable(tablename,[
        {
            column:'id',
            name:'ID',
            type:'hidden',
        }
        ,{
            column:'flag_type',
            name:'Flag Type',
            type:'hidden',
            _default:default_type,
            hiddenInList:true,
        }
        ,{
            column:'flag_value',
            name:heading,
            type:'text',
        }
        // ,{
        //     column:'note_value',
        //     name:'Note',
        //     type:'textarea',
        //     hiddenInList:true,
        // }
        // ,{
        //     column:'table_notes_image',
        //     name:'Image',
        //     callback:'show_image_ytable',
        //     type:'image',
        //     typeData : 'table_notes',
        //     hiddenInList:true,
        // }
        // ,{
        //     column:'img_id',
        //     type:'ignore',
        //     hiddenInList:true,
        // }
        // ,{
        //     column:'table_notes_thumb_image',
        //     name:'Thumb',
        //     callback:'show_image_ytable',
        //     type:'image',
        //     typeData : 'table_notes_thumb_image',
        //     hiddenInList:true,
        // }
        // ,{
        //     column:'img_id_thumb',
        //     type:'ignore',
        //     hiddenInList:true,
        // }
        // ,{
        //     column:'id',
        //     name:'Image',
        //     type:'image',
        //     hiddenInList:true,
        //     _table:'m_flag_main',
        // },{
        //     column:'id',
        //     name:'Image thumb',
        //     type:'image',
        //     hiddenInList:true,
        //     _table:'m_flag_thumb',
        // }
        ,{
            column:'is_active',
            name:'Is Active?',
            callback:'is_active',
            type:'checkbox',
            hiddenInList:true,
        }
    ],
    [
         //{ "left join" : "(select id as img_id,ref_id,table_name as img_tblename,img_path as table_notes_image from imagetable where imagetable.table_name='table_notes' and imagetable.type='1') as imagetable on  imagetable.ref_id=table_notes.id" } ,
         //{ "left join" : "(select id as img_id_thumb,ref_id as thumb_ref_id,table_name as img_tblename_thumb,img_path as table_notes_thumb_image from imagetable where imagetable.table_name='table_notes_thumb' and imagetable.type='1') as imagetable_thumb on  imagetable_thumb.thumb_ref_id=table_notes.id" } ,
    ],
    [
        'editFast',
        'delete'
    ],'.ytable',{
        "where":total_filters,
        "order by" : "id desc",
        // "group by" : "table_notes.id",
    },ydebugger);
    ytabled.autoCallbacksonBuild.push('turnOnDblClickCopyyTable');
    ytabled.autoCallbacksonBuild.push('turnOnMultiImage');
window.addEventListener('ytable_beforeRow', function (e) {
    //console.log(e.detail);
    //var olddata = ytabled.currentData[e.detail.dataIndex].id;
    //ytabled.currentData[e.detail.dataIndex].id = '<a href="javscript:void(0)">'+olddata+'</a>';
});
window.addEventListener('ytable_afterRow', function (e) {
    //console.log(e.detail);
    /*here you will get the unique index of every row added in the ytable*/
    $('[data-toggle="tooltip"]').tooltip();
});
window.addEventListener('ytable_columnAdded_{columnname}', function (e) {
    /*Here you get specific column event only you can defnie events like 
        ytable_columnAdded_id
        ytable_columnAdded_name
        ytable_columnAdded_email
        ytable_columnAdded_updatedAt

    and then update only on those specific columns , this event will fire whenever the column is added in ytable
    */
    //console.log(e.detail);
    //ytabled.currentData[e.detail.dataIndex].id = 'TESTING UPDATE';
});
window.addEventListener('fastCrudSuccess', function (e) {
    /*Fires after you update/create record and that record is successfully updated/created 
    e.datail = response
    */
});
window.addEventListener('fastCrudFailed', function (e) {
    /*Fires after you try to update/create record and it fails either in validation or for some other reasons 
    e.datail = response
    */
});
window.onhashchange = ()=> { window.location.reload() };
})();

var enableFastCrud = ()=>{
    document.getElementsByClassName('ytable-addrecord')[0].addEventListener('click',(e)=>{
        $('#ytable-FastCRUD').modal('toggle');
        document.getElementById('ytable_table').value=tablename;
        document.getElementById('unique_column').value=ytabled.uniqueCol;
        fastCRUDForm(ytabled);
    })
}