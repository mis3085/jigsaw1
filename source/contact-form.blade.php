---
title: Contact
description: Get in touch with us
---
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

<meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
<meta property="og:type" content="{{ $page->type ?? 'website' }}" />
<meta property="og:url" content="{{ $page->getUrl() }}"/>
<meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

<title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

<link rel="home" href="{{ $page->baseUrl }}">
<link rel="icon" href="/favicon.ico">
<link rel="preload" as="font">
<link rel="preconnect" href="https://fonts.googleapis.com" />


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-69X5JLW3TG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-69X5JLW3TG');
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
<script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>
</head>

<body class="container py-2">

<div class="btn-group mb-2">
  <button type="button" class="btn btn-primary" onclick="setLanguage('sp')">Español</button>
  <button type="button" class="btn btn-primary" onclick="setLanguage('en')">English</button>
  <button type="button" class="btn btn-primary" onclick="setLanguage('ch')">中文</button>
</div>

<ul class="mb-3" x-data="">
  <template x-for="item in $store.inquiryCart.items">
    <li class="">
      <img x-bind:src="'https://images.weserv.nl/?output=webp&w=80&h=80&url=' + item.image" x-show="item.image" width="80" style="max-height:80px"/>
      <span class="mr-4" x-text="item.id"></span>
      <span class="mr-4" x-text="item.title"></span>
      <span class="mr-4" x-text="item.url"></span>
      <button class="btn btn-sm btn-outline-danger" x-on:click="$store.inquiryCart.items = $store.inquiryCart.items.filter(v => v.id != item.id)">X</button>
    </li>
  </template>
</ul>

<div id="formio"></div>

<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
  document.addEventListener('alpine:initializing', () => {
      Alpine.store('inquiryCart', {
          items: Alpine.$persist([]).as('inquiryCartItems')
      })
  })
</script>
<script>
Formio.createForm(document.getElementById('formio'), {
  components: [
    {
      type: 'textfield',
      key: 'firstName',
      label: 'First Name',
      placeholder: 'Enter your first name',
      input: true
    },
    {
      type: 'textfield',
      key: 'lastName',
      label: 'Last Name',
      placeholder: 'Enter your last name',
      input: true
    },
    {
      type: 'survey',
      key: 'questions',
      label: 'Survey',
      values: [
        {
          label: 'Great',
          value: 'great'
        },
        {
          label: 'Good',
          value: 'good'
        },
        {
          label: 'Poor',
          value: 'poor'
        }
      ],
      questions: [
        {
          label: 'How would you rate our service?',
          value: 'howWouldYouRateOurService'
        },
        {
          label: 'How was Customer Support?',
          value: 'howWasCustomerSupport'
        },
        {
          label: 'Overall Experience?',
          value: 'overallExperience'
        }
      ]
    },
    {
      "label": "Signature",
      "tableView": false,
      "validate": {
        "required": true
      },
      "key": "signature",
      "type": "signature",
      "input": true
    },
    {
      type: 'button',
      //"disableOnInvalid": true,
      action: 'submit',
      label: 'Submit',
      theme: 'primary'
    }
  ]
}, {
  language: 'ch',
  i18n: {
    sp: {
      'First Name': 'Nombre de pila',
      'Last Name': 'Apellido',
      'Enter your first name': 'Ponga su primer nombre',
      'Enter your last name': 'Introduce tu apellido',
      'How would you rate our service?': '¿Cómo calificaría nuestro servicio?',
      'How was Customer Support?': '¿Cómo fue el servicio de atención al cliente?',
      'Overall Experience?': '¿Experiencia general?',
      Survey: 'Encuesta',
      Excellent: 'Excelente',
      Great: 'Estupendo',
      Good: 'Bueno',
      Average: 'Promedio',
      Poor: 'Pobre',
      'Submit': 'Enviar',
      complete: 'Presentación Completa',
    },
    ch: {
      'First Name': '名字',
      'Last Name': '姓',
      'Enter your first name': '输入你的名字',
      'Enter your last name': '输入你的姓氏',
      'How would you rate our service?': '你如何评价我們提供的服務？',
      'How was Customer Support?': '客户支持如何？',
      'Overall Experience?': '总体体验？',
       Survey: '调查',
      Excellent: '优秀',
      Great: '很好',
      Good: '好',
      Average: '平均',
      Poor: '不好',
      'Submit': '提交',
      Signature: '人機檢驗',
      'Sign above':'請畫下任意線條',
      complete: '提交完成',

      unsavedRowsError: '請在繼續之前保存所有行。',
      invalidRowsError: '請在繼續之前更正無效行。',
      invalidRowError: '無效的行。請更正或刪除。',
      alertMessageWithLabel: '@{{label}}: @{{message}}',
      alertMessage: '@{{message}}',
      complete: '提交完成',
      error: '請在提交前修正以下錯誤。',
      errorListHotkey: '按 Ctrl + Alt + X 返回錯誤列表。',
      errorsListNavigationMessage: '單擊以導航到出現以下錯誤的字段。',
      submitError: '請在提交前檢查表單並更正所有錯誤。',
      required: '@{{field}} 是必需的',
      unique: '@{{field}} 必須是唯一的',
      array: '@{{field}} 必須是一個數組',
      array_nonempty: '@{{field}} 必須是非空數組',
      nonarray: '@{{field}} 不能是數組',
      select: '@{{field}} 包含無效的選擇',
      pattern: '@{{field}} 不匹配模式 @{{pattern}}',
      minLength: '@{{field}} 必須至少有 @{{length}} 個字符。',
      maxLength: '@{{field}} 不得超過 @{{length}} 個字符。',
      minWords: '@{{field}} 必須至少有 @{{length}} 個單詞。',
      maxWords: '@{{field}} 不得超過 @{{length}} 個字。',
      min: '@{{field}} 不能小於 @{{min}}。',
      max: '@{{field}} 不能大於 @{{max}}。',
      maxDate: '@{{field}} 不應包含 @{{- maxDate}} 之後的日期',
      minDate: '@{{field}} 不應包含 @{{- minDate}} 之前的日期',
      maxYear: '@{{field}} 不應包含大於 @{{maxYear}} 的年份',
      minYear: '@{{field}} 不應包含小於 @{{minYear}} 的年份',
      invalid_email: '@{{field}} 必須是有效的電子郵件。',
      invalid_url: '@{{field}} 必須是一個有效的 url。',
      invalid_regex: '@{{field}} 不匹配模式 @{{regex}}.',
      invalid_date: '@{{field}} 不是有效日期。',
      invalid_day: '@{{field}} 不是有效日期。',
      mask: '@{{field}} 與掩碼不匹配。',
      valueIsNotAvailable: '@{{ field }} 是無效值。',
      stripe: '@{{stripe}}',
      month:'月',
      day:'日',
      year:'年份',
      january:'一月',
      february:'二月',
      march:'三月',
      april:'四月',
      may:'五月',
      june:'六月',
      july:'七月',
      august:'八月',
      september:'九月',
      october:'十月',
      november:'十一月',
      december:'十二月',
      next:'下一個',
      previous:'上一個',
      cencel:'取消',
      submit: '提交表格',
      confirmCancel: '您確定要取消嗎？',
      saveDraftInstanceError: '無法保存草稿,因為沒有 formio 實例。',
      saveDraftAuthError: '除非用戶通過身份驗證,否則無法保存草稿。',
      restoreDraftInstanceError: '無法恢復草稿,因為沒有 formio 實例。',
      time: '無效時間',
      cancelButtonAriaLabel: '取消按鈕。點擊重置表格',
      previousButtonAriaLabel:'上一個按鈕。單擊以返回上一個選項卡',
      nextButtonAriaLabel:'下一個按鈕。單擊以轉到下一個選項卡',
      submitButtonAriaLabel:'提交表單按鈕。點擊提交表格'
    }
  }
}).then(function(form) {
  window.setLanguage = function(lang) {
    form.language = lang;
  };

  // Prevent the submission from going to the form.io server.
  form.nosubmit = true;

  // Triggered when they click the submit button.
  form.on('submit', function(submission) {
    submission.data.cartItems = Alpine.store('inquiryCart').items;

    console.log(submission);

    alert('Submission sent to https://hookbin.com/oXkg1NKQ1euYX7mgwqRX . See developer console.');
    return Formio.fetch('https://hookb.in/oXkg1NKQ1euYX7mgwqRX', {
        body: JSON.stringify(submission),
        headers: {
          'content-type': 'application/json'
        },
        method: 'POST',
        mode: 'cors',
      })
      .then(function(response) {
        form.emit('submitDone', submission);
        form.resetValue();
        Alpine.store('inquiryCart').items = [];

        response.json()
      })
  });
});
</script>

</body>
</html>
