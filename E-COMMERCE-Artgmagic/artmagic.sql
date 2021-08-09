/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     15/7/2021 16:19:59                           */
/*==============================================================*/


drop index TBLPRODUCT_TBLORDER_FK;

drop index RTBLUSER_TBLORDER_FK;

drop index TBLORDER_PK;

drop table TBLORDER;

drop index TBLPRODUCT_PK;

drop table TBLPRODUCT;

drop index TBLUSER_PK;

drop table TBLUSER;

/*==============================================================*/
/* Table: TBLORDER                                              */
/*==============================================================*/
create table TBLORDER (
   ID_ORDER             SERIAL               not null,
   ID_USER              INT4                 null,
   ID_PRODUCT           INT4                 null,
   DATE_ORDER           DATE                 not null,
   STATE_ORDER          INT4                 not null,
   ADDRESS_ORDER        VARCHAR(100)         not null,
   PHONE_ORDER          VARCHAR(50)          not null,
   constraint PK_TBLORDER primary key (ID_ORDER)
);

/*==============================================================*/
/* Index: TBLORDER_PK                                           */
/*==============================================================*/
create unique index TBLORDER_PK on TBLORDER (
ID_ORDER
);

/*==============================================================*/
/* Index: RTBLUSER_TBLORDER_FK                                  */
/*==============================================================*/
create  index RTBLUSER_TBLORDER_FK on TBLORDER (
ID_USER
);

/*==============================================================*/
/* Index: TBLPRODUCT_TBLORDER_FK                                */
/*==============================================================*/
create  index TBLPRODUCT_TBLORDER_FK on TBLORDER (
ID_PRODUCT
);

/*==============================================================*/
/* Table: TBLPRODUCT                                            */
/*==============================================================*/
create table TBLPRODUCT (
   ID_PRODUCT           SERIAL               not null,
   NAMEPRO              VARCHAR(50)          not null,
   DESCRIPTIONPRO       VARCHAR(100)         not null,
   PRICEPRO             NUMERIC(6,2)         not null,
   STATEPRO             INT4                 not null,
   RUTAIMG              TEXT                 not null,
   constraint PK_TBLPRODUCT primary key (ID_PRODUCT)
);

/*==============================================================*/
/* Index: TBLPRODUCT_PK                                         */
/*==============================================================*/
create unique index TBLPRODUCT_PK on TBLPRODUCT (
ID_PRODUCT
);

/*==============================================================*/
/* Table: TBLUSER                                               */
/*==============================================================*/
create table TBLUSER (
   ID_USER              SERIAL               not null,
   NAMEUSE              VARCHAR(50)          not null,
   LAST_NAMEUSE         VARCHAR(50)          not null,
   EMAILUSE             VARCHAR(50)          not null,
   PASSWORDUSE          VARCHAR(50)          not null,
   STATEUSE             INT4                 not null,
   constraint PK_TBLUSER primary key (ID_USER)
);

/*==============================================================*/
/* Index: TBLUSER_PK                                            */
/*==============================================================*/
create unique index TBLUSER_PK on TBLUSER (
ID_USER
);

alter table TBLORDER
   add constraint FK_TBLORDER_RTBLUSER__TBLUSER foreign key (ID_USER)
      references TBLUSER (ID_USER)
      on delete restrict on update restrict;

alter table TBLORDER
   add constraint FK_TBLORDER_TBLPRODUC_TBLPRODU foreign key (ID_PRODUCT)
      references TBLPRODUCT (ID_PRODUCT)
      on delete restrict on update restrict;

