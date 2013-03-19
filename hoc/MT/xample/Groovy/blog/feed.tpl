<$mt:HTTPContentType type="application/atom+xml"$><?xml version="1.0" encoding="<$mt:PublishCharset$>"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <title><$mt:BlogName remove_html="1" encode_xml="1"$></title>
    <link rel="alternate" type="text/html" href="<$mt:BlogURL encode_xml="1"$>" />
    <link rel="self" type="application/atom+xml" href="<$mt:Link template="feed_recent"$>" />
    <id>tag:<$mt:BlogHost exclude_port="1" encode_xml="1"$>,<$mt:TemplateCreatedOn format="%Y-%m-%d"$>:<$mt:BlogRelativeURL encode_xml="1"$>/<$mt:BlogID$></id>
    <updated><mt:Entries lastn="1"><$mt:EntryModifiedDate utc="1" format="%Y-%m-%dT%H:%M:%SZ"$></mt:Entries></updated>
    <mt:If tag="BlogDescription"><subtitle><$mt:BlogDescription remove_html="1" encode_xml="1"$></subtitle></mt:If>
    <generator uri="http://www.sixapart.com/movabletype/"><$mt:ProductName version="1"$></generator>
<mt:Entries lastn="15">
<entry>
    <title><$mt:EntryTitle remove_html="1" encode_xml="1"$></title>
    <link rel="alternate" type="text/html" href="<$mt:EntryPermalink encode_xml="1"$>" />
    <id><$mt:EntryAtomID$></id>

    <published><$MTEntryDate format="%m月%d日"$></published>
    <updated><$mt:EntryModifiedDate utc="1" format="%Y-%m-%dT%H:%M:%SZ"$></updated>

    <summary><$mt:EntryExcerpt remove_html="1" encode_xml="1"$></summary>
    <author>
        <name><$mt:EntryAuthorDisplayName encode_xml="1"$></name>
        <mt:If tag="EntryAuthorURL"><uri><$mt:EntryAuthorURL encode_xml="1"$></uri></mt:If>
    </author>
    <mt:EntryCategories>
        <category term="<$mt:CategoryLabel encode_xml="1"$>" scheme="http://www.sixapart.com/ns/types#category" />
    </mt:EntryCategories>
    <mt:EntryIfTagged><mt:EntryTags><category term="<$mt:TagName normalize="1" encode_xml="1"$>" label="<$mt:TagName encode_xml="1"$>" scheme="http://www.sixapart.com/ns/types#tag" />
    </mt:EntryTags></mt:EntryIfTagged>
    <content type="html" xml:lang="<$mt:BlogLanguage ietf="1"$>" xml:base="<$mt:BlogURL encode_xml="1"$>">
        <$mt:EntryBody encode_xml="1"$>
        <$mt:EntryMore encode_xml="1"$>
    </content>
</entry>
</mt:Entries>
</feed>
