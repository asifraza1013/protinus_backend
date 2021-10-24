<?php

return [
    'login' => 'users/login',
    'add_user' => 'users/addUser',
    'user_list' => 'users/getUser',
    'user_detail' => 'users/getUserById',
    'update_user' => 'users/updateUser',
    'delete_user' => 'users/deleteUser',



    'admin_list' => 'admins/getAdmin',
    'add_admin' => 'admins/addAdmin',
    'get_admin' => 'admins/getAdminById',
    'delete_admin' => 'admins/deleteAdmin',


    'developer_list' => 'developers/getDeveloper',
    'add_developer' => 'developers/addDeveloper',
    'get_developer' => 'developers/getDeveloperById',
    'update_developer' => 'developers/updateDeveloper',
    'delete_developer' => 'developers/deleteDeveloper',
    'developer_transactions_list' => 'developerPayouts/getDeveloperPayout',


    'category_list' => 'categorys/getCategory',
    'add_category' => 'categorys/addCategory',
    'delete_category' => 'categorys/deleteCategory',

    'add_subcategory' => 'subCategorys/addSubCategory',
    'get_subcategory' => 'subCategorys/getSubCategoryById',
    'subcategory_list' => 'subCategorys/getSubCategory',
    'delete_subcategory' => 'subCategorys/deleteSubCategory',
    'update_subcategory' => 'subCategorys/updateSubCategory',

    'get_notifications' => 'notifications/getNotification',
    'add_notifications' => 'notifications/addNotification',

    'promo_code_list' => 'promoCodes/getPromoCode',
    'add_promo_code' => 'promoCodes/addPromoCode',
    'get_promo_code' => 'promoCodes/getPromoCodeById',
    'delete_promo_code' => 'promoCodes/deletePromoCode',
    'update_promo_code' => 'promoCodes/updatePromoCode',

    'product_list' => 'products/getProduct',
    'add_proudct' => 'products/addProduct',
    'get_product' => 'products/getProductById',
    'delete_product' => 'products/deleteProduct',
    'update_product' => 'products/updateProduct',
    'add_product_trasactions' => 'products/addProductTransaction',
    'get_product_trasactions' => 'products/getProductTransaction',
    'update_product_trasactions' => 'products/updateProductTransaction',
    'get_product_trasactions_by_id' => 'products/getProductTransactionById',
    'delete_product_trasactions' => 'products/deleteProductTransaction',

    'suppoer_list' => 'supports/getsupport',
    'add_support' => 'supports/addsupport',
    'get_support' => 'supports/getsupportById',
    'update_support' => 'supports/updatesupport',
    'delete_support' => 'supports/deletesupport',

    'add_room_template' => 'roomTemplates/addRoomTemplate',
    'room_template_list' => 'roomTemplates/getRoomTemplate',
    'get_room_template' => 'roomTemplates/getRoomTemplateById',
    'delete_room_template' => 'roomTemplates/deleteRoomTemplate',
    'update_room_template' => 'roomTemplates/updateRoomTemplate',
    'add_room_template_transaction' => 'roomTemplates/addRoomTransaction',
    'room_template_transaction_list' => 'roomTemplates/getRoomTransaction',
    'update_room_template_transaction' => 'roomTemplates/updateRoomTransaction',
    'get_room_template_transaction' => 'roomTemplates/getRoomTransactionById',
    'delete_room_template_transaction' => 'roomTemplates/deleteRoomTransaction',

    'review_rating_list' => 'ratingReviews/getRatingReview',

    'dashboard' => 'dashboards/getDashboard',

    'add_subscription' => 'subscriptions/addSubscription',
    'subscription_list' => 'subscriptions/getSubscription',
    'get_subscription' => 'subscriptions/getSubscriptionById',
    'delete_subscription' => 'subscriptions/deleteSubscription',
    'update_subscription' => 'subscriptions/updateSubscription',
    'subscription_transactions_list' => 'subscriptions/getSubscriptionTransaction',
];

?>
