<?php

return [
    'singular' => 'المسئول',
    'plural'   => 'المسئولين',
    'empty'    => 'لا يوجد مسئولين.',
    'count'    => 'عدد المسئولين',
    'search'   => 'بحث',
    'actions'  => [
        'list'    => 'عرض الكل',
        'create'  => 'اضافة مسئول',
        'show'    => 'عرض المسئول',
        'edit'    => 'تعديل المسئول',
        'delete'  => 'حذف المسئول',
        'options' => 'خيارات',
        'save'    => 'حفظ',
    ],
    'messages' => [
        'created' => 'تم اضافة المسئول بنجاح.',
        'updated' => 'تم تعديل المسئول بنجاح.',
        'deleted' => 'تم حذف المسئول بنجاح.',
    ],
    'attributes' => [
        'name'                  => 'الاسم',
        'email'                 => 'البريد الالكتروني',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تاكيد كلمة المرور',
        'avatar'                => 'الصورة الشخصية',
    ],
    'placeholders' => [
        'name'                  => 'اكتب اسم المسئول',
        'email'                 => 'اكتب البريد الالكتروني الخاص بالمسئول',
        'password'              => 'اكتب كلمة المرور',
        'password_confirmation' => 'اعد كتابة كلمة المرور',
    ],
    'notes' => [
        'email'    => 'مثال : name@example.com',
        'password' => 'يجب ان تكون كلمة المرور مكونة من 8 احرف',
    ],
    'dialogs' => [
        'delete' => [
            'title'   => 'تحذير !',
            'info'    => 'هل انت متأكد انك تريد حذف المسئول ؟',
            'confirm' => 'حذف',
            'cancel'  => 'الغاء',
        ],
    ],
];
