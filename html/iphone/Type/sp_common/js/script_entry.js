$(function() {
	//tab
	$('#entryMemberTab').tab();
	
	//complete::slide
	var csma = $('#completeSkillMatchArea');
	var csmaSlideKey = $('#completeSkillMatchArea a.base');
	
	csmaSlideKey.each(function() {
		var $_t = $($(this).attr('href')).find('.detailList');
		$(this).toggleRelContent($_t, {effect: true});
	});
	
	//resume::clone item
	$('.fmCloneContent a').click(function() {
	 	var $self = $(this);
		var $id = $(this).attr('href');
		var $tBase = $($id);
		
		if($tBase.length < 0) {
			return false;
		}
		
		var $tItem = $tBase.find('> li');
		var $tItemEx = $tItem.filter(':first-child');
		var $tItemLen = $tItem.length;
		var $tClone = $tItemEx.clone();
		
		$tClone.find('label,input,select').each(function() {
			var $_t = $(this);
			var $oname = $_t.attr('name');
			var $oid = $_t.attr('id');
			var $ofor = $_t.attr('for');
			var $ovalue = $_t.attr('value');
			var tag = $_t.get(0).nodeName.toLowerCase();
			
			if(tag === 'label') {
				$_t.attr('for', $ofor.replace(/([a-zA-Z0-9]+)[0-9]+/, '$1' + ($tItemLen + 1)));
			} else if(tag === 'select') {
				var $_opt = $_t.find('option').removeAttr('selected');
				$_opt.filter(':first-child').attr('selected', 'selected');
			} else if (tag === 'input') {
				$_t.attr('value', '');
			}
			
			if($oname) {
				$_t.attr('name', $oname.replace(/([a-zA-Z0-9]+)[0-9]+/, '$1' + ($tItemLen + 1)));
			}
			
			if($oid) {
				$_t.attr('id', $oid.replace(/([a-zA-Z0-9]+)[0-9]+/, '$1' + ($tItemLen + 1)));
			}
			
		});
		
		$tBase.append($tClone);
		
		return false;
	});
	
	//template
	var expTemplLabel = new Array(
		"�\�t�g�E�F�A�֘A�G���W�j�A",
		"�@�B�݌v�G���W�j�A/��H�݌v�G���W�j�A",
		"�����̊֘A",
		"�d�C�ʐM�Z�p�֘A/���Y�Z�p/�i���E���Y�Ǘ�",
		"�Z�[���X�E�T�[�r�X�G���W�j�A/FAE",
		"�l������",
		"�o��",
		"�}�[�P�e�B���O/�L��",
		"�o�c���",
		"����",
		"�A�V�X�^���g",
		"�@�l�c��/�l�c��/IT�c��",
		"�̔��E�T�[�r�X�֘A�E",
		"IT�R���T���^���g",
		"�R���T���^���g",
		"���z�E�ݔ��A�y�؊֘A",
		"Web�f�U�C�i�["
	);
	
	var expTemplContents = new Array (
"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n�@�@�s�v���W�F�N�g�T�v�t\n\n\n�@�@���v���W�F�N�g���ԁF���������N�������`���������N������\n\n\n�@�@���Ɩ����e\n\n\n�@�@���J���H��\n\n\n�@�@������\n\n\n�@�@���J���K��\n\n\n�@�@���J����\n\n\n�@�@�@�@[�@��]\n\n\n�@�@�@�@[OS]\n\n\n�@�@�@�@[����]\n\n\n�@�@�@�@[�A�v���P�[�V����]\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@���S���Ɩ�\n\n\n�@������\n\n\n�@���J���K��\n\n\n�@���J����\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y�擾�Z�p�z\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@���S���Ɩ�\n\n\n�@������\n\n\n�@���J���K��\n\n\n�@���J����\n\n\n�@����ȊJ�����i/�c�[��\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y�擾�Z�p�z\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@���S���Ɩ�\n\n\n�@������\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y�擾�Z�p�z\n\n\n�y�擾���i�z\n\n\n���������N�������擾\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@���S���Ɩ�\n\n\n�@������\n\n\n�@����舵�����i\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�@���Ɩ����e\n\n\n�@�@�s�̗p�Ɩ��t\n\n\n�@�@�@�@[�S���Ɩ�]\n\n\n�@�@�@�@[�K��]\n\n\n�@�@�@�@[����]\n\n\n�@�@�s���^�Ǘ��t\n\n\n�@�@�s�J���t\n\n\n�@�@�s�l�����x���t\n\n\n�@�@�s����E���C�t\n\n\n�@�@�s�����֘A�t\n\n\n�@������\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�yPC�X�L���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�@���Ǘ��c�[��(�\�t�g)\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�yPC�X�L���z\n\n\n�y�擾���i�z\n\n\n���������N�������擾\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�@���K��\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�yPC�X�L���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�yPC�X�L���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�y���сE�Ɩ����ʁz\n\n\n�yPC�X�L���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�y���сE�Ɩ����ʁz\n\n\n�yPC�X�L���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@[�S�����i�i�T�[�r�X�j�̊T�v]\n\n\n�@[�c�ƃX�^�C��]�@�V�K�J�񁣁����@�A�����ڋq������\n\n\n�@[�S���G���A]\n\n\n�@[����ڋq]�@�S���А��������`������\n\n\n�@[�S���i�ڋq�̋Ǝ�E�G���A�j]\n\n\n�@[����]�@���������N�x������сF�����������~�i�B�����������j\n\n\n�y�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�y�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n�y�ۗL���i�z\n\n\n���������N�������擾\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�@���K��\n\n\n�@���J����\n\n\n�@�@�@[�@��]\n\n\n�@�@�@[OS]\n\n\n�@�@�@[����]\n\n\n�@�@�@[�A�v���P�[�V����]\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�@���K��\n\n\n�y���сE�Ɩ����ʁz\n\n\n�y���ӕ���z\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�@���K��\n\n\n�y�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n�y�ۗL���i�z\n\n\n���������N�������擾\n\n\n",
		"�y���Ɠ��e�z\n\n\n�y�E���o��v��z\n\n\n�y�������z\n\n\n���������N������\n\n\n�y�E���o���ڍׁz\n\n\n���������N�������`���������N������\n\n\n�s�v���W�F�N�g�T�v�t\n\n\n�@���Ɩ����e\n\n\n�@������\n\n\n�@���K��\n\n\n�@���g�p�c�[��\n\n\n�y�Ɩ����ʁz\n\n\n�y�}�l�W�����g�o���z\n\n\n�yPC�X�L���z\n\n\n�y���ӕ���z\n\n\n�y�A�s�[���|�C���g�z\n\n\n"
	);
	
	var $expTemplTextArea = $('#fmCareerDutyContent');
	var $expTemplSelect = $('<select>').attr({name: 'fmCareerDutyTemplate', id: 'fmCareerDutyTemplate'});
	var $expTemplBtn = $('<a>').attr({'href': '#', 'class': 'btn1 arrowRBtn'}).append('<span>���`���Ăяo��</span>');
	var $expTemplNotice = $('<p>').addClass('note').html('���m�����n�����̓t�H�[���Ɏc���Ă���ƁA�ۑ����邱�Ƃ��ł��܂���B');
	
	
	$expTemplSelect.append(
						$('<option>')
							.attr('value', 0)
							.html('�I�����Ă�������')
					);
	
	for(var i = 1, len = expTemplLabel.length; i <= len; i++) {
		$expTemplSelect.append(
							$('<option>')
								.attr('value', i)
								.html(expTemplLabel[i])
						);
	}
	
	$expTemplBtn.click(function() {
		var _selectedIndex = $expTemplSelect.find('option:selected').attr('value');
		
		if(_selectedIndex == 0) {
			alert('�v���_�E���Ő��^��I�����Ă��������B');
			return false;
		} else {
			if($expTemplTextArea.attr('value').length > 0) {
				if( !window.confirm("�E�����e��I�����ꂽ���^�ŏ㏑�����܂��B��낵���ł����H")) {
					return false;
				}
			}
			
			$expTemplTextArea
				.attr('value', expTemplContents[_selectedIndex - 1])
				.trigger('keyup');
			
			//form update
			if($expTemplTextArea.hasClass('fmCountArea')) {
				$expTemplTextArea.trigger('keyup');
			}
			
		}
		
		return false;
	});
	
	$expTemplTextArea.parent().before($expTemplSelect, $expTemplBtn, $expTemplNotice);
	
	
});