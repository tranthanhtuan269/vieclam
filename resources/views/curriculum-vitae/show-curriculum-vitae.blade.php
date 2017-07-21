@extends('layouts.company')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">            
            <div class="row curriculumvitae">
                <div class="col-md-12">
                    <div class="row main-top">
                        <div class="col-md-4">
                            <img src="{{ url('/') }}/images/{{ $curriculumvitae->avatar }}" width="250" height="250" class="img-circle">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{ $curriculumvitae->name }}</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Ngày sinh: {{ $curriculumvitae->birthday }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Giới tính: @if($curriculumvitae->gender == 0) Nữ @else Nam @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Tỉnh / Thành phố: {{ $curriculumvitae->city }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Quận / Huyện: {{ $curriculumvitae->district }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Quá trình học tập</div>
                                <div class="panel-body">
                                    <?php 
                                        $curriculumvitae->education = ltrim($curriculumvitae->education, ';');
                                        $educations = explode(";",$curriculumvitae->education);
                                        // var_dump($educations);die;
                                        foreach ($educations as $education) {
                                        $edu = json_decode($education);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-1">Trường học </div>
                                        <div class="col-md-4">{{ $edu->truong_hoc }}</div>
                                        <div class="col-md-4">@if( $edu->student_process == 0) Đang học @else Đã tốt nghiệp @endif</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-1">Thời gian học </div>
                                        <div class="col-md-4">Từ {{ $edu->thang_bat_dau }}/{{ $edu->nam_bat_dau }} </div>
                                        <div class="col-md-4">@if( $edu->student_process == 0) Đến nay @else Đến {{ $edu->thang_ket_thuc }}/{{ $edu->nam_ket_thuc }} @endif </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-1">Chuyên ngành </div>
                                        <div class="col-md-8">{{ $edu->chuyen_nganh }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-1">Thành tích học tập </div>
                                        <div class="col-md-8"></div>
                                    </div>
                                    <hr>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Kinh nghiệm làm việc</div>
                                <div class="panel-body">
                                    <?php 
                                        $curriculumvitae->word_experience = ltrim($curriculumvitae->word_experience, ';');
                                        $word_experiences = explode(";",$curriculumvitae->word_experience);
                                        foreach ($word_experiences as $word_experience) {
                                        $exp = json_decode($word_experience);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4"><img src="{{ $exp->company_image }}" width="100%" height="192"></div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">Vị trí công việc</div>
                                                <div class="col-md-8">{{ $exp->vi_tri }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Tên đơn vị đã làm</div>
                                                <div class="col-md-8">{{ $exp->ten_cong_ty }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Địa chỉ</div>
                                                <div class="col-md-8">{{ $exp->dia_chi_cong_ty }} - {{ $exp->quan_huyen }} - {{ $exp->thanh_pho }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Thời gian làm</div>
                                                <div class="col-md-8">Từ {{ $exp->thang_bat_dau_lam_viec }}/{{ $exp->nam_bat_dau_lam_viec }} Đến {{ $exp->thang_ket_thuc_lam_viec }}/{{ $exp->nam_ket_thuc_lam_viec }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">Mô tả công việc</div>
                                                <div class="col-md-8"><?php echo $exp->mo_ta; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Kỹ năng</div>
                                <div class="panel-body">
                                    <div class="row">
                                    <?php 
                                        $curriculumvitae->qualification = ltrim($curriculumvitae->qualification, ';');
                                        $qualifications = explode(";",$curriculumvitae->qualification);
                                    ?>
                                        <div class="col-md-12">Thành thạo 
                                            @for ($i = 0; $i < count($qualifications); $i++)
                                                <?php 
                                                    $qual = json_decode($qualifications[$i]);
                                                    if($i+1 == count($qualifications))
                                                        echo ' và ' . $qual->ten_ky_nang;
                                                    elseif($i+2 == count($qualifications))
                                                        echo $qual->ten_ky_nang;
                                                    else
                                                        echo $qual->ten_ky_nang . ',';
                                                ?>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Ngoại ngữ</div>
                                <div class="panel-body">
                                    <?php 
                                        $curriculumvitae->language = ltrim($curriculumvitae->language, ';');
                                        $languages = explode(";",$curriculumvitae->language);
                                        foreach ($languages as $language) {
                                        $lang = json_decode($language);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">{{ $lang->ten_ngoai_ngu }}</div>
                                        <div class="col-md-6">{{ $lang->trinh_do_ngoai_ngu }}</div>
                                    </div>
                                    <hr>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Sở thích / Tính cách</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6"><?php echo $curriculumvitae->interests; ?></div>
                                        <div class="col-md-6"><?php echo $curriculumvitae->references; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Mục đích làm việc?</div>
                                <div class="panel-body">
                                    <div class="row">
                                    <?php 
                                        $curriculumvitae->career_objective = ltrim($curriculumvitae->career_objective, ';');
                                        $career_objectives = explode(";",$curriculumvitae->career_objective);
                                        foreach ($career_objectives as $career_objective) {
                                            switch ($career_objective) {
                                                case 'career_objective_0':
                                                    echo '<div class="col-md-12">- Muốn được trải nghiệm trong môi trường làm việc tại Doanh nghiệp!</div>';
                                                    break;
                                                case 'career_objective_1':
                                                    echo '<div class="col-md-12">- Học hỏi kinh nghiệm và các kỹ năng xử lý tình huống trong công việc!</div>';
                                                    break;
                                                case 'career_objective_2':
                                                    echo '<div class="col-md-12">- Rèn luyện thêm khả năng giao tiếp!</div>';
                                                    break;
                                                case 'career_objective_3':
                                                    echo '<div class="col-md-12">- Rèn luyện tác phong làm việc chuyên nghiệp!</div>';
                                                    break;
                                                case 'career_objective_4':
                                                    echo '<div class="col-md-12">- Thử đi làm thêm để trải nghiệm!</div>';
                                                    break;
                                                case 'career_objective_5':
                                                    echo '<div class="col-md-12">- Kiếm thêm thu nhập để đi du lịch!</div>';
                                                    break;
                                                case 'career_objective_6':
                                                    echo '<div class="col-md-12">- Kiếm thêm thu nhập trang trải chi tiêu cá nhân!</div>';
                                                    break;
                                                case 'career_objective_7':
                                                    echo '<div class="col-md-12">- Kiếm thêm thu nhập hỗ trợ gia đình!</div>';
                                                    break;
                                                default:
                                                    break;
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">Hoạt động ngoại khóa</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12"><?php echo $curriculumvitae->active; ?></div>
                                    </div>
                                    <div class="row">
                                        <?php 
                                            $images = explode(";",$curriculumvitae->images);
                                            $i = 0;
                                            foreach ($images as $image) {
                                                $i++;
                                                if($i%4 == 0) break;
                                        ?>
                                        <div class="col-md-4"><img src="{{ url('/') }}/images/{{ $image }}" width="100%" height="192"></div>
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"style="display:none;">
                            <div class="btn btn-danger pull-right">In hồ sơ</div>
                            <div class="btn btn-primary pull-right">Lưu hồ sơ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
